<?php

namespace JasonRoman\NbaApi\Client;

use JasonRoman\NbaApi\Request\AbstractDataRequest;
use JasonRoman\NbaApi\Response\NbaApiResponseInterface;

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
     * @param AbstractDataRequest $request
     * @param array $config
     * @return NbaApiResponseInterface
     */
    public function request(AbstractDataRequest $request, array $config = [])
    {
        return parent::doRequest($request, $config);
    }
}