<?php

namespace JasonRoman\NbaApi\Client\Nba;

use JasonRoman\NbaApi\Client\AbstractClient;
use JasonRoman\NbaApi\Request\Nba\AbstractNbaRequest;
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
            throw new \InvalidArgumentException('Request must be of type AbstractNbaRequest');
        }

        return parent::request($request, $config);
    }
}