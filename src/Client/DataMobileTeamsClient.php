<?php

namespace JasonRoman\NbaApi\Client;

use JasonRoman\NbaApi\Request\Data\MobileTeams\Game\FullPlayByPlayRequest;
use JasonRoman\NbaApi\Request\Data\MobileTeams\Game\GameDetailRequest;
use JasonRoman\NbaApi\Request\Data\MobileTeams\Player\PlayerCardRequest;
use JasonRoman\NbaApi\Request\Data\MobileTeams\Playoffs\PlayoffBracketRequest;
use JasonRoman\NbaApi\Request\Data\MobileTeams\Roster\TeamRosterRequest;
use JasonRoman\NbaApi\Request\Data\MobileTeams\Schedule\LeagueRollingScheduleRequest;
use JasonRoman\NbaApi\Request\Data\MobileTeams\Schedule\LeagueScheduleRequest;
use JasonRoman\NbaApi\Request\Data\MobileTeams\Schedule\LeagueScheduleMonthRequest;
use JasonRoman\NbaApi\Request\Data\MobileTeams\Schedule\LeagueTicketsRequest;
use JasonRoman\NbaApi\Request\Data\MobileTeams\Scores\TodaysScoresRequest;
use JasonRoman\NbaApi\Request\Data\MobileTeams\Standings\StandingsRequest;
use JasonRoman\NbaApi\Request\Data\MobileTeams\Team\TeamCoachesRequest;
use JasonRoman\NbaApi\Response\NbaApiResponse;

/**
 * Client that accesses data.nba.com and endpoints which contain /mobile_teams in them.
 * Listed are the series of all possible Data\MobileTeams requests.
 */
class DataMobileTeamsClient extends AbstractDataClient
{
    /**
     * @param FullPlayByPlayRequest $request
     * @param array $config
     * @return NbaApiResponse
     */
    public function getFullPlayByPlay(FullPlayByPlayRequest $request, array $config = [])
    {
        return $this->request($request, $config);
    }

    /**
     * @param GameDetailRequest $request
     * @param array $config
     * @return NbaApiResponse
     */
    public function getGameDetail(GameDetailRequest $request, array $config = [])
    {
        return $this->request($request, $config);
    }

    /**
     * @param PlayerCardRequest $request
     * @param array $config
     * @return NbaApiResponse
     */
    public function getPlayerCard(PlayerCardRequest $request, array $config = [])
    {
        return $this->request($request, $config);
    }

    /**
     * @param PlayoffBracketRequest $request
     * @param array $config
     * @return NbaApiResponse
     */
    public function getPlayoffBracket(PlayoffBracketRequest $request, array $config = [])
    {
        return $this->request($request, $config);
    }

    /**
     * @param TeamRosterRequest $request
     * @param array $config
     * @return NbaApiResponse
     */
    public function getTeamRoster(TeamRosterRequest $request, array $config = [])
    {
        return $this->request($request, $config);
    }

    /**
     * @param LeagueRollingScheduleRequest $request
     * @param array $config
     * @return NbaApiResponse
     */
    public function getLeagueRollingSchedule(LeagueRollingScheduleRequest $request, array $config = [])
    {
        return $this->request($request, $config);
    }

    /**
     * @param LeagueScheduleRequest $request
     * @param array $config
     * @return NbaApiResponse
     */
    public function getLeagueSchedule(LeagueScheduleRequest $request, array $config = [])
    {
        return $this->request($request, $config);
    }

    /**
     * @param LeagueScheduleMonthRequest $request
     * @param array $config
     * @return NbaApiResponse
     */
    public function getLeagueScheduleMonth(LeagueScheduleMonthRequest $request, array $config = [])
    {
        return $this->request($request, $config);
    }

    /**
     * @param LeagueTicketsRequest $request
     * @param array $config
     * @return NbaApiResponse
     */
    public function getLeagueTickets(LeagueTicketsRequest $request, array $config = [])
    {
        return $this->request($request, $config);
    }

    /**
     * @param TodaysScoresRequest $request
     * @param array $config
     * @return NbaApiResponse
     */
    public function getTodaysScores(TodaysScoresRequest $request, array $config = [])
    {
        return $this->request($request, $config);
    }

    /**
     * @param StandingsRequest $request
     * @param array $config
     * @return NbaApiResponse
     */
    public function getStandings(StandingsRequest $request, array $config = [])
    {
        return $this->request($request, $config);
    }

    /**
     * @param TeamCoachesRequest $request
     * @param array $config
     * @return NbaApiResponse
     */
    public function getTeamCoaches(TeamCoachesRequest $request, array $config = [])
    {
        return $this->request($request, $config);
    }
}