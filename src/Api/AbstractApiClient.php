<?php

namespace JasonRoman\NbaApi\Api;

use GuzzleHttp\Client as GuzzleClient;
use GuzzleHttp\Exception\ClientException;

/**
 * Abstract class that other API clients can extend from.
 */
abstract class AbstractApiClient
{
    const TIMEOUT         = 5;
    const CONNECT_TIMEOUT = 3;

    const DEFAULT_HEADERS = [
        // required headers
        'User-Agent'      =>
            'Mozilla/5.0 (Windows NT 10.0; Win64; x64) '.
            'AppleWebKit/537.36 (KHTML, like Gecko) '.
            'Chrome/58.0.3029.110 '.
            'Safari/537.36',
        'Origin'          => 'http://stats.nba.com',
        'Accept'          => 'application/json, text/plain, */*',
        // optional headers that might help prevent timeouts
        'DNT'             => '1',
        'Accept-Language' => 'en-US,en;q=0.8,af;q=0.6',
        'Accept-Encoding' => 'gzip, deflate, sdch',
        'Host'            => 'stats.nba.com',
        'Referer'         => 'http://stats.nba.com',
        'Content-Type'    => 'application/json',
        'Connection'      => 'keep-alive',
        'Cache-Control'   => 'no-cache, no-store, must-revalidate',
    ];

    /**
     * @var GuzzleClient
     */
    protected $guzzle;

    /**
     * @return array
     */
    abstract protected function getHeaders();

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