<?php

namespace JasonRoman\NbaApi\Client\Api;

use JasonRoman\NbaApi\Client\AbstractClient;
use JasonRoman\NbaApi\Request\Api\AbstractApiRequest;
use JasonRoman\NbaApi\Request\NbaApiRequestInterface;

abstract class AbstractApiClient extends AbstractClient
{
    const BASE_URI = 'http://api.nba.net';

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
        return self::DEFAULT_HEADERS;
    }

    /**
     * {@inheritdoc}
     * @throws \InvalidArgumentException if request is not the proper type
     */
    public function request(NbaApiRequestInterface $request, array $config = [])
    {
        if (!$request instanceof AbstractApiRequest) {
            throw new \InvalidArgumentException('Request must be of type AbstractApiRequest');
        }

        return parent::request($request, $config);
    }
}