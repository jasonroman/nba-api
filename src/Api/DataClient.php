<?php

namespace JasonRoman\NbaApi\Api;

use GuzzleHttp\Client as GuzzleClient;
use JasonRoman\NbaApi\Request\Data\AbstractDataApiRequest;
use JasonRoman\NbaApi\Request\Data\AbstractStatsApiRequest;
use JasonRoman\NbaApi\Request\Data\FullPlayByPlay;
use Psr\Http\Message\ResponseInterface;

class DataClient extends ApiClient
{
    // defaults
    const BASE_URI        = 'http://data.nba.com/data/';
    const TIMEOUT         = 3;
    const CONNECT_TIMEOUT = 3;

    const HEADERS = [
        // required headers
        'User-Agent'      =>
            'Mozilla/5.0 (Windows NT 10.0; Win64; x64) '.
            'AppleWebKit/537.36 (KHTML, like Gecko) '.
            'Chrome/58.0.3029.110 '.
            'Safari/537.36',
        'Origin'          => 'http://data.nba.com',
        'Accept'          => 'application/json, text/plain, */*',
        // optional headers
        'Referer'         => 'http://data.nba.com',
        'Content-Type'    => 'application/json',
        'Accept-Language' => 'en-US',
        'Connection'      => 'keep-alive',
        'Cache-Control'   => 'no-cache',
    ];

    const CONFIG = [
        'base_uri'        => self::BASE_URI,
        'timeout'         => self::TIMEOUT,
        'connect_timeout' => self::CONNECT_TIMEOUT,
        'headers'         => self::HEADERS,
    ];

    public function __construct(array $config = [])
    {
        parent::__construct(new GuzzleClient(array_merge(self::CONFIG, $config)));
    }

    /**
     * @param AbstractDataApiRequest $request
     * @param array $config
     * @return ResponseInterface|null
     */
    public function request(AbstractDataApiRequest $request, array $config = [])
    {
        return $this->apiRequest(
            'GET',
            $request->getEndpoint(),
            array_merge(
                ['query' => $request->toArray()],
                $config
            )
        );
    }

    /**
     * @param FullPlayByPlay $request
     * @param array $config
     * @return ResponseInterface|null
     */
    public function getFullPlayByPlay(FullPlayByPlay $request, array $config = [])
    {
        return $this->request($request, $config);
    }
}