<?php

namespace JasonRoman\NbaApi\Client\Stats;

use JasonRoman\NbaApi\Client\AbstractClient;
use JasonRoman\NbaApi\Request\Stats\AbstractStatsRequest;
use JasonRoman\NbaApi\Request\NbaApiRequestInterface;
use JasonRoman\NbaApi\Response\NbaApiResponse;

abstract class AbstractStatsClient extends AbstractClient
{
    const BASE_URI   = 'http://stats.nba.com';
    const SHORT_NAME = 'stats';

    const CONFIG = [
        'base_uri'        => self::BASE_URI,
        'timeout'         => self::TIMEOUT,
        'connect_timeout' => self::CONNECT_TIMEOUT,
    ];

    /**
     * {@inheritdoc}
     */
    protected function getHeaders(): array
    {
        return self::DEFAULT_HEADERS;
    }

    /**
     * {@inheritdoc}
     * @throws \InvalidArgumentException if request is not the proper type
     */
    public function request(NbaApiRequestInterface $request, array $config = []): NbaApiResponse
    {
        if (!$request instanceof AbstractStatsRequest) {
            throw new \InvalidArgumentException('Request must be of type AbstractStatsRequest');
        }

        // the query string contains from all of the request parameters
        return parent::request($request, $config);
    }
}