<?php

namespace JasonRoman\NbaApi\Client;

use JasonRoman\NbaApi\Request\Data\MobileTeams\Game\FullPlayByPlayRequest;
use JasonRoman\NbaApi\Request\Data\MobileTeams\Game\GameDetailRequest;
use JasonRoman\NbaApi\Request\Data\MobileTeams\Roster\TeamRosterRequest;
use JasonRoman\NbaApi\Request\Data\MobileTeams\Schedule\FullScheduleRequest;
use JasonRoman\NbaApi\Request\Data\MobileTeams\Schedule\LeagueScheduleRequest;
use JasonRoman\NbaApi\Request\Data\MobileTeams\Scores\PlayerCardRequest;
use JasonRoman\NbaApi\Request\Data\MobileTeams\Scores\TodaysScoresRequest;
use JasonRoman\NbaApi\Response\ApiResponse;

/**
 * Client that accesses data.nba.com and endpoints which contain /mobile_teams in them.
 * Listed are the series of all possible Data\MobileTeams requests.
 */
class DataMobileTeamsClient extends AbstractDataClient
{
    /**
     * @param FullPlayByPlayRequest $request
     * @param array $config
     * @return ApiResponse
     */
    public function getFullPlayByPlay(FullPlayByPlayRequest $request, array $config = [])
    {
        return $this->request($request, $config);
    }

    /**
     * @param GameDetailRequest $request
     * @param array $config
     * @return ApiResponse
     */
    public function getGameDetail(GameDetailRequest $request, array $config = [])
    {
        return $this->request($request, $config);
    }

    /**
     * @param PlayerCardRequest $request
     * @param array $config
     * @return ApiResponse
     */
    public function getPlayerCard(PlayerCardRequest $request, array $config = [])
    {
        return $this->request($request, $config);
    }

    /**
     * @param TeamRosterRequest $request
     * @param array $config
     * @return ApiResponse
     */
    public function getTeamRoster(TeamRosterRequest $request, array $config = [])
    {
        return $this->request($request, $config);
    }

    /**
     * @param FullScheduleRequest $request
     * @param array $config
     * @return ApiResponse
     */
    public function getFullSchedule(FullScheduleRequest $request, array $config = [])
    {
        return $this->request($request, $config);
    }

    /**
     * @param LeagueScheduleRequest $request
     * @param array $config
     * @return ApiResponse
     */
    public function getLeagueSchedule(LeagueScheduleRequest $request, array $config = [])
    {
        return $this->request($request, $config);
    }

    /**
     * @param TodaysScoresRequest $request
     * @param array $config
     * @return ApiResponse
     */
    public function getTodaysScores(TodaysScoresRequest $request, array $config = [])
    {
        return $this->request($request, $config);
    }
}