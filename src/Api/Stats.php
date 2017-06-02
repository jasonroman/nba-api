<?php

namespace JasonRoman\NbaApi\Stats;

use GuzzleHttp\Client;
use GuzzleHttp\Psr7\Request;

class Stats
{
    const BASE_URI = 'http://stats.nba.com/stats/';

    const ENDPOINT_TEAM_INFO_COMMON = 'teaminfocommon';

    /**
     * @var Client
     */
    private $guzzle;

    public function __construct()
    {
        $this->guzzle = new Client(['base_uri' => self::BASE_URI]);
    }

    public function getTeamInfoCommon($seasonId, $teamId, $leagueId, $seasonType)
    {
        $response = $this->guzzle->request('GET', self::ENDPOINT_TEAM_INFO_COMMON, [
            'SeasonID'   => $seasonId,
            'TeamID'     => $teamId,
            'LeagueID'   => $leagueId,
            'SeasonType' => $seasonType,
        ]);

        return $response;
    }
}