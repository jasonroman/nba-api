<?php

namespace JasonRoman\NbaApi\Client;

use JasonRoman\NbaApi\Request\AbstractApiRequest;
use JasonRoman\NbaApi\Response\NbaApiResponseInterface;

abstract class AbstractApiClient extends AbstractClient
{
    const BASE_URI = 'http://api.nba.net/';

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
     * @param AbstractApiRequest $request
     * @param array $config
     * @return NbaApiResponseInterface
     */
    public function request(AbstractApiRequest $request, array $config = [])
    {
        // the query string contains from all of the request parameters
        return parent::doRequest($request, array_merge(['query' => $request->toArray()], $config));
    }
}