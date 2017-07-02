<?php

namespace JasonRoman\NbaApi\Client;

use GuzzleHttp\Client as GuzzleClient;
use JasonRoman\NbaApi\Request\AbstractStatsRequest;
use JasonRoman\NbaApi\Request\Stats\AbstractStatsApiRequest;
use JasonRoman\NbaApi\Request\Stats\CommonAllPlayers;
use JasonRoman\NbaApi\Request\Stats\CommonPlayerInfo;
use JasonRoman\NbaApi\Request\Stats\CommonTeamYears;
use JasonRoman\NbaApi\Request\Stats\TeamInfoCommon;
use JasonRoman\NbaApi\Request\Stats\VideoStatus;
use Psr\Http\Message\ResponseInterface;

class StatsClient extends AbstractApiClient
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
     * @return ResponseInterface|null
     */
    public function request(AbstractStatsRequest $request, array $config = [])
    {
        // the query string contains from all of the request parameters
        return parent::doRequest($request, array_merge(['query' => $request->toArray()], $config));
    }

    /**
     * @param CommonAllPlayers $request
     * @param array $config
     * @return ResponseInterface|null
     */
    public function getCommonAllPlayers(CommonAllPlayers $request, array $config = [])
    {
        return $this->request($request, $config);
    }

    /**
     * @param CommonPlayerInfo $request
     * @param array $config
     * @return ResponseInterface|null
     */
    public function getCommonPlayerInfo(CommonPlayerInfo $request, array $config = [])
    {
        return $this->request($request, $config);
    }

    /**
     * @param CommonTeamYears $request
     * @param array $config
     * @return ResponseInterface|null
     */
    public function getCommonTeamYears(CommonTeamYears $request, array $config = [])
    {
        return $this->request($request, $config);
    }

    /**
     * @param TeamInfoCommon $request
     * @param array $config
     * @return ResponseInterface|null
     */
    public function getTeamInfoCommon(TeamInfoCommon $request, array $config = [])
    {
        return $this->request($request, $config);
    }



    /**
     * @param VideoStatus $request
     * @param array $config
     * @return ResponseInterface|null
     */
    public function getVideoStatus(VideoStatus $request, array $config = [])
    {
        return $this->request($request, $config);
    }
}