<?php

namespace JasonRoman\NbaApi\Api;

use JasonRoman\NbaApi\Request\Stats\AbstractStatsApiRequest;
use JasonRoman\NbaApi\Request\Stats\TeamInfoCommon;
use Psr\Http\Message\ResponseInterface;

class StatsClient extends ApiClient
{
    // defaults
    const BASE_URI        = 'http://stats.nba.com/stats/';
    const TIMEOUT         = 3;
    const CONNECT_TIMEOUT = 3;

    const HEADERS = [
        // required headers
        'User-Agent'      =>
            'Mozilla/5.0 (Windows NT 10.0; Win64; x64) '.
            'AppleWebKit/537.36 (KHTML, like Gecko) '.
            'Chrome/58.0.3029.110 '.
            'Safari/537.36',
        'Origin'          => 'http://stats.nba.com',
        'Accept'          => 'application/json, text/plain, */*',
        // optional headers
        'Referer'         => 'http://stats.nba.com',
        'Content-Type'    => 'application/json',
        'Accept'          => 'application/json, text/plain, */*',
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

    /**
     * @param AbstractStatsApiRequest $request
     * @param array $config
     * @return ResponseInterface|null
     */
    public function apiRequest(AbstractStatsApiRequest $request, $config = [])
    {
        return $this->guzzle->request(
            'GET',
            $request->getEndpoint(),
            array_merge(
                ['query' => $request->toArray()],
                $config
            )
        );
    }

    /**
     * @param TeamInfoCommon $request
     * @return ResponseInterface|null
     */
    public function getTeamInfoCommon(TeamInfoCommon $request)
    {
        return $this->apiRequest($request);
    }
}