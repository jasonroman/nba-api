<?php

namespace JasonRoman\NbaApi\Client\Nba;

use JasonRoman\NbaApi\Client\AbstractClient;
use JasonRoman\NbaApi\Request\Nba\AbstractNbaRequest;
use JasonRoman\NbaApi\Request\NbaApiRequestInterface;
use JasonRoman\NbaApi\Response\NbaApiResponse;

abstract class AbstractNbaClient extends AbstractClient
{
    const BASE_URI   = 'http://www.nba.com';
    const SHORT_NAME = 'nba';

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
    protected function getHeaders(): array
    {
        return array_merge(self::DEFAULT_HEADERS, self::HEADERS);
    }

    /**
     * {@inheritdoc}
     * @throws \InvalidArgumentException if request is not the proper type
     */
    public function request(NbaApiRequestInterface $request, array $config = []): NbaApiResponse
    {
        if (!$request instanceof AbstractNbaRequest) {
            throw new \InvalidArgumentException('Request must be of type AbstractNbaRequest');
        }

        return parent::request($request, $config);
    }
}