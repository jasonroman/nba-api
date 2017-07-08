<?php

namespace JasonRoman\NbaApi\Client;

use JasonRoman\NbaApi\Request\AbstractStatsRequest;
use JasonRoman\NbaApi\Response\NbaApiResponseInterface;

abstract class AbstractStatsClient extends AbstractClient
{
    const BASE_URI = 'http://stats.nba.com/stats/';

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
     * @param AbstractStatsRequest $request
     * @param array $config
     * @return NbaApiResponseInterface
     */
    public function request(AbstractStatsRequest $request, array $config = [])
    {
        // the query string contains from all of the request parameters
        return parent::doRequest($request, array_merge(['query' => $request->toArray()], $config));
    }
}