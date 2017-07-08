<?php

namespace JasonRoman\NbaApi\Client;

use JasonRoman\NbaApi\Request\AbstractNbaRequest;
use JasonRoman\NbaApi\Response\NbaApiResponseInterface;

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
     * @param AbstractNbaRequest $request
     * @param array $config
     * @return NbaApiResponseInterface
     */
    public function request(AbstractNbaRequest $request, array $config = [])
    {
        return parent::doRequest($request, $config);
    }
}