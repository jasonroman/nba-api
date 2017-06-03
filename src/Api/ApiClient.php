<?php

namespace JasonRoman\NbaApi\Api;

use GuzzleHttp\Client as GuzzleClient;
use GuzzleHttp\Exception\ClientException;

/**
 * Abstract class that other API clients can extend from.
 */
abstract class ApiClient
{
    /**
     * @var GuzzleClient
     */
    protected $guzzle;

    /**
     * @param GuzzleClient $guzzle
     */
    public function __construct(GuzzleClient $guzzle = null)
    {
        $this->guzzle = ($guzzle) ?? new GuzzleClient();
    }

    /**
     * @param mixed $method
     * @param string $uri
     * @param array $options
     * @return mixed
     */
    protected function apiRequest($method, $uri, array $options = [])
    {
        try {
            $response = $this->guzzle->request($method, $uri, $options);
        } catch (ClientException $e) {
            $response = $e->getResponse();
        }

        return $response;
    }
}