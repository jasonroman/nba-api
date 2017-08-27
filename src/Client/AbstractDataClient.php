<?php

namespace JasonRoman\NbaApi\Client;

use JasonRoman\NbaApi\Request\AbstractDataRequest;
use JasonRoman\NbaApi\Request\NbaApiRequestInterface;

abstract class AbstractDataClient extends AbstractClient
{
    // it appears data.nba.com could also be used;
    const BASE_URI = 'http://data.nba.net/';

    const HEADERS = [
        'Origin' => 'http://data.nba.net',
        'Host'   => 'data.nba.net',
    ];

    const CONFIG = [
        'base_uri'        => self::BASE_URI,
        'timeout'         => self::TIMEOUT,
        'connect_timeout' => self::CONNECT_TIMEOUT,
    ];

    /**
     * {@inheritdoc}
     */
    protected function getHeaders()
    {
        return array_merge(self::DEFAULT_HEADERS, self::HEADERS);
    }

    /**
     * {@inheritdoc}
     * @throws \InvalidArgumentException if request is not the proper type
     */
    public function request(NbaApiRequestInterface $request, array $config = [])
    {
        if (!$request instanceof AbstractDataRequest) {
            throw new \InvalidArgumentException('Request must be of type AbstractApiRequest');
        }

        // the query string contains from all of the request parameters
        return parent::request($request, $config);
    }
}