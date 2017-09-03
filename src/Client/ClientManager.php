<?php

namespace JasonRoman\NbaApi\Client;

use Symfony\Component\Finder\Finder;

/**
 * Main ClientManager for ease of use; essentially allows a single instance to be used
 * instead of creating the drilled-down clients for whenever retrieving an individual request.
 */
class ClientManager
{
    /**
     * @var AbstractClient[]
     */
    public $clients;

    public function __construct()
    {
        $this->setClientsKeys();
    }

    public function setClientsKeys()
    {
        $clientDomains = (new Finder())->directories()->in(__DIR__)->depth(0);

        foreach ($clientDomains as $domain) {
            $domainBasename = $domain->getBasename();

            $clients = (new Finder())
                ->files()
                ->in(__DIR__.DIRECTORY_SEPARATOR.$domainBasename)
                ->depth(0)
            ;

            foreach ($clients as $client) {
                $clientBasename = $client->getBasename('.php');
                $prefix         = AbstractClient::ABSTRACT_PREFIX;

                if (substr($clientBasename, 0, strlen($prefix)) === $prefix) {
                    continue;
                }

                $clientFqcn = AbstractClient::BASE_NAMESPACE.'\\'.$domainBasename.'\\'.$client->getBasename('.php');

                $this->clients[$clientFqcn::getClientId()] = $clientFqcn;
            }
        }
    }

    public function getClient($clientName)
    {
        if (!array_key_exists($clientName, $this->clients)) {
            throw new \Exception('Invalid client name specified');
        }

        if (is_string($this->clients[$clientName])) {
            $this->initialize($clientName, $this->clients[$clientName]);
        }

        return $this->clients[$clientName];
    }

    protected function initialize($clientName, $clientFqcn)
    {
        $this->clients[$clientName] = new $clientFqcn();
    }
}