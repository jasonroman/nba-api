<?php

namespace JasonRoman\NbaApi\Client;

use JasonRoman\NbaApi\Request\AbstractNbaRequest;
use JasonRoman\NbaApi\Request\NbaApiRequestInterface;

abstract class AbstractNbaClient extends AbstractClient
{
    const BASE_URI = 'http://www.nba.com';

    const HEADERS = [
        'Origin' => 'http://www.nba.net',
        'Host'   => 'www.nba.net',
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
        if (!$request instanceof AbstractNbaRequest) {
            throw new \InvalidArgumentException('Request must be of type AbstractApiRequest');
        }

        // the query string contains from all of the request parameters
        return parent::request($request, array_merge(['query' => $request->toArray()], $config));
    }
}