<?php

namespace JasonRoman\NbaApi\Client\StatsProd;

use JasonRoman\NbaApi\Client\AbstractClient;
use JasonRoman\NbaApi\Request\NbaApiRequestInterface;
use JasonRoman\NbaApi\Request\StatsProd\AbstractStatsProdRequest;

abstract class AbstractStatsProdClient extends AbstractClient
{
    const BASE_URI = 'http://stats-prod.nba.com';

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
        if (!$request instanceof AbstractStatsProdRequest) {
            throw new \InvalidArgumentException('Request must be of type AbstractStatsProdRequest');
        }

        // the query string contains from all of the request parameters
        return parent::request($request, $config);
    }
}