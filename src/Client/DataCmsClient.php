<?php

namespace JasonRoman\NbaApi\Client;

use JasonRoman\NbaApi\Request\Data\Cms\Game\BoxscoreRequest;
use JasonRoman\NbaApi\Request\Data\Cms\Game\FullPlayByPlayRequest;
use JasonRoman\NbaApi\Request\Data\Cms\Game\PlayByPlayRequest;
use JasonRoman\NbaApi\Request\Data\Cms\Game\PlayersPerGameRequest;
use JasonRoman\NbaApi\Request\Data\Cms\Game\PreviewRequest;
use JasonRoman\NbaApi\Request\Data\Cms\Game\RecapRequest;
use JasonRoman\NbaApi\Request\Data\Cms\Roster\SummerLeagueGenericTeamRosterRequest;
use JasonRoman\NbaApi\Request\Data\Cms\Roster\SummerLeagueTeamRosterRequest;
use JasonRoman\NbaApi\Request\Data\Cms\Roster\TeamRosterRequest;
use JasonRoman\NbaApi\Request\Data\Cms\Schedule\ScheduleNbaGamesRequest;
use JasonRoman\NbaApi\Request\Data\Cms\Schedule\ScheduleRequest;
use JasonRoman\NbaApi\Request\Data\Cms\Schedule\SummerLeagueScheduleRequest;
use JasonRoman\NbaApi\Request\Data\Cms\Scores\ScoreboardRequest;
use JasonRoman\NbaApi\Request\Data\Cms\Standings\ConferenceStandingsRequest;
use JasonRoman\NbaApi\Request\Data\Cms\Standings\DivisionStandingsRequest;
use JasonRoman\NbaApi\Request\Data\Cms\Standings\StandingsRequest;
use JasonRoman\NbaApi\Request\Data\Cms\Stats\TeamRegularSeasonStatsAndRankingsRequest;
use JasonRoman\NbaApi\Request\Data\Cms\Teams\SportsMetaTeamsRequest;
use JasonRoman\NbaApi\Request\Data\Cms\TodayRequest;
use JasonRoman\NbaApi\Response\NbaApiResponse;

/**
 * Client that accesses data.nba.com and endpoints which contain /cms in them.
 * Listed are the series of all possible Data\Cms requests.
 */
class DataCmsClient extends AbstractDataClient
{
    /**
     * @param TodayRequest $request
     * @param array $config
     * @return NbaApiResponse
     */
    public function getToday(TodayRequest $request, array $config = [])
    {
        return $this->request($request, $config);
    }

    /**
     * @param BoxscoreRequest $request
     * @param array $config
     * @return NbaApiResponse
     */
    public function getBoxscore(BoxscoreRequest $request, array $config = [])
    {
        return $this->request($request, $config);
    }

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
     * @param PlayByPlayRequest $request
     * @param array $config
     * @return NbaApiResponse
     */
    public function getPlayByPlay(PlayByPlayRequest $request, array $config = [])
    {
        return $this->request($request, $config);
    }

    /**
     * @param PlayersPerGameRequest $request
     * @param array $config
     * @return NbaApiResponse
     */
    public function getPlayersPerGame(PlayersPerGameRequest $request, array $config = [])
    {
        return $this->request($request, $config);
    }

    /**
     * @param PreviewRequest $request
     * @param array $config
     * @return NbaApiResponse
     */
    public function getPreview(PreviewRequest $request, array $config = [])
    {
        return $this->request($request, $config);
    }

    /**
     * @param RecapRequest $request
     * @param array $config
     * @return NbaApiResponse
     */
    public function getRecap(RecapRequest $request, array $config = [])
    {
        return $this->request($request, $config);
    }

    /**
     * @param SummerLeagueGenericTeamRosterRequest $request
     * @param array $config
     * @return NbaApiResponse
     */
    public function getSummerLeagueGenericTeamRoster(SummerLeagueGenericTeamRosterRequest $request, array $config = [])
    {
        return $this->request($request, $config);
    }

    /**
     * @param SummerLeagueTeamRosterRequest $request
     * @param array $config
     * @return NbaApiResponse
     */
    public function getSummerLeagueTeamRoster(SummerLeagueTeamRosterRequest $request, array $config = [])
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
     * @param ScheduleRequest $request
     * @param array $config
     * @return NbaApiResponse
     */
    public function getSchedule(ScheduleRequest $request, array $config = [])
    {
        return $this->request($request, $config);
    }

    /**
     * @param ScheduleNbaGamesRequest $request
     * @param array $config
     * @return NbaApiResponse
     */
    public function getScheduleNbaGames(ScheduleNbaGamesRequest $request, array $config = [])
    {
        return $this->request($request, $config);
    }

    /**
     * @param SummerLeagueScheduleRequest $request
     * @param array $config
     * @return NbaApiResponse
     */
    public function getSummerLeagueSchedule(SummerLeagueScheduleRequest $request, array $config = [])
    {
        return $this->request($request, $config);
    }

    /**
     * @param ScoreboardRequest $request
     * @param array $config
     * @return NbaApiResponse
     */
    public function getScoreboard(ScoreboardRequest $request, array $config = [])
    {
        return $this->request($request, $config);
    }

    /**
     * @param ConferenceStandingsRequest $request
     * @param array $config
     * @return NbaApiResponse
     */
    public function getConferenceStandings(ConferenceStandingsRequest $request, array $config = [])
    {
        return $this->request($request, $config);
    }

    /**
     * @param DivisionStandingsRequest $request
     * @param array $config
     * @return NbaApiResponse
     */
    public function getDivisionStandings(DivisionStandingsRequest $request, array $config = [])
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
     * @param TeamRegularSeasonStatsAndRankingsRequest $request
     * @param array $config
     * @return NbaApiResponse
     */
    public function getTeamRegularSeasonStatsAndRankings(
        TeamRegularSeasonStatsAndRankingsRequest $request,
        array $config = []
    ) {
        return $this->request($request, $config);
    }

    /**
     * @param SportsMetaTeamsRequest $request
     * @param array $config
     * @return NbaApiResponse
     */
    public function getSportsMetaTeams(SportsMetaTeamsRequest $request, array $config = [])
    {
        return $this->request($request, $config);
    }
}