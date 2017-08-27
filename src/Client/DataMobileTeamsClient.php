<?php

namespace JasonRoman\NbaApi\Client;

use JasonRoman\NbaApi\Request\Data\MobileTeams\Game\FullPlayByPlayRequest;
use JasonRoman\NbaApi\Request\Data\MobileTeams\Game\GameDetailRequest;
use JasonRoman\NbaApi\Request\Data\MobileTeams\Playoffs\PlayoffBracketRequest;
use JasonRoman\NbaApi\Request\Data\MobileTeams\Roster\TeamRosterRequest;
use JasonRoman\NbaApi\Request\Data\MobileTeams\Schedule\LeagueRollingScheduleRequest;
use JasonRoman\NbaApi\Request\Data\MobileTeams\Schedule\LeagueScheduleRequest;
use JasonRoman\NbaApi\Request\Data\MobileTeams\Schedule\LeagueScheduleMonthRequest;
use JasonRoman\NbaApi\Request\Data\MobileTeams\Schedule\LeagueTicketsRequest;
use JasonRoman\NbaApi\Request\Data\MobileTeams\Schedule\TeamCoachesRequest;
use JasonRoman\NbaApi\Request\Data\MobileTeams\Scores\PlayerCardRequest;
use JasonRoman\NbaApi\Request\Data\MobileTeams\Scores\TodaysScoresRequest;
use JasonRoman\NbaApi\Request\Data\MobileTeams\Standings\StandingsRequest;
use JasonRoman\NbaApi\Response\NbaApiResponseInterface;

/**
 * Client that accesses data.nba.com and endpoints which contain /mobile_teams in them.
 * Listed are the series of all possible Data\MobileTeams requests.
 */
class DataMobileTeamsClient extends AbstractDataClient
{
    /**
     * @param FullPlayByPlayRequest $request
     * @param array $config
     * @return NbaApiResponseInterface
     */
    public function getFullPlayByPlay(FullPlayByPlayRequest $request, array $config = [])
    {
        return $this->request($request, $config);
    }

    /**
     * @param GameDetailRequest $request
     * @param array $config
     * @return NbaApiResponseInterface
     */
    public function getGameDetail(GameDetailRequest $request, array $config = [])
    {
        return $this->request($request, $config);
    }

    /**
     * @param PlayerCardRequest $request
     * @param array $config
     * @return NbaApiResponseInterface
     */
    public function getPlayerCard(PlayerCardRequest $request, array $config = [])
    {
        return $this->request($request, $config);
    }

    /**
     * @param PlayoffBracketRequest $request
     * @param array $config
     * @return NbaApiResponseInterface
     */
    public function getPlayoffBracket(PlayoffBracketRequest $request, array $config = [])
    {
        return $this->request($request, $config);
    }

    /**
     * @param TeamRosterRequest $request
     * @param array $config
     * @return NbaApiResponseInterface
     */
    public function getTeamRoster(TeamRosterRequest $request, array $config = [])
    {
        return $this->request($request, $config);
    }

    /**
     * @param LeagueRollingScheduleRequest $request
     * @param array $config
     * @return NbaApiResponseInterface
     */
    public function getLeagueRollingSchedule(LeagueRollingScheduleRequest $request, array $config = [])
    {
        return $this->request($request, $config);
    }

    /**
     * @param LeagueScheduleRequest $request
     * @param array $config
     * @return NbaApiResponseInterface
     */
    public function getLeagueSchedule(LeagueScheduleRequest $request, array $config = [])
    {
        return $this->request($request, $config);
    }

    /**
     * @param LeagueScheduleMonthRequest $request
     * @param array $config
     * @return NbaApiResponseInterface
     */
    public function getLeagueScheduleMonth(LeagueScheduleMonthRequest $request, array $config = [])
    {
        return $this->request($request, $config);
    }

    /**
     * @param LeagueTicketsRequest $request
     * @param array $config
     * @return NbaApiResponseInterface
     */
    public function getLeagueTickets(LeagueTicketsRequest $request, array $config = [])
    {
        return $this->request($request, $config);
    }

    /**
     * @param TodaysScoresRequest $request
     * @param array $config
     * @return NbaApiResponseInterface
     */
    public function getTodaysScores(TodaysScoresRequest $request, array $config = [])
    {
        return $this->request($request, $config);
    }

    /**
     * @param StandingsRequest $request
     * @param array $config
     * @return NbaApiResponseInterface
     */
    public function getStandings(StandingsRequest $request, array $config = [])
    {
        return $this->request($request, $config);
    }

    /**
     * @param TeamCoachesRequest $request
     * @param array $config
     * @return NbaApiResponseInterface
     */
    public function getTeamCoaches(TeamCoachesRequest $request, array $config = [])
    {
        return $this->request($request, $config);
    }
}