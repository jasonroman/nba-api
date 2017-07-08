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
use JasonRoman\NbaApi\Request\Data\Cms\Schedule\ScheduleRequest;
use JasonRoman\NbaApi\Request\Data\Cms\Schedule\SummerLeagueScheduleRequest;
use JasonRoman\NbaApi\Request\Data\Cms\Scores\ScoreboardRequest;
use JasonRoman\NbaApi\Request\Data\Cms\Standings\ConferenceStandingsRequest;
use JasonRoman\NbaApi\Request\Data\Cms\Standings\DivisionStandingsRequest;
use JasonRoman\NbaApi\Request\Data\Cms\Standings\StandingsRequest;
use JasonRoman\NbaApi\Request\Data\Cms\Stats\TeamRegularSeasonStatsAndRankingsRequest;
use JasonRoman\NbaApi\Request\Data\Cms\Team\SportsMetaTeamsRequest;
use JasonRoman\NbaApi\Request\Data\Cms\TodayRequest;
use JasonRoman\NbaApi\Response\NbaApiResponseInterface;

/**
 * Client that accesses data.nba.com and endpoints which contain /cms in them.
 * Listed are the series of all possible Data\Cms requests.
 */
class DataCmsClient extends AbstractDataClient
{
    /**
     * @param TodayRequest $request
     * @param array $config
     * @return NbaApiResponseInterface
     */
    public function getToday(TodayRequest $request, array $config = [])
    {
        return $this->request($request, $config);
    }

    /**
     * @param BoxscoreRequest $request
     * @param array $config
     * @return NbaApiResponseInterface
     */
    public function getBoxscore(BoxscoreRequest $request, array $config = [])
    {
        return $this->request($request, $config);
    }

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
     * @param PlayByPlayRequest $request
     * @param array $config
     * @return NbaApiResponseInterface
     */
    public function getPlayByPlay(PlayByPlayRequest $request, array $config = [])
    {
        return $this->request($request, $config);
    }

    /**
     * @param PlayersPerGameRequest $request
     * @param array $config
     * @return NbaApiResponseInterface
     */
    public function getPlayersPerGame(PlayersPerGameRequest $request, array $config = [])
    {
        return $this->request($request, $config);
    }

    /**
     * @param PreviewRequest $request
     * @param array $config
     * @return NbaApiResponseInterface
     */
    public function getPreview(PreviewRequest $request, array $config = [])
    {
        return $this->request($request, $config);
    }

    /**
     * @param RecapRequest $request
     * @param array $config
     * @return NbaApiResponseInterface
     */
    public function getRecap(RecapRequest $request, array $config = [])
    {
        return $this->request($request, $config);
    }

    /**
     * @param SummerLeagueGenericTeamRosterRequest $request
     * @param array $config
     * @return NbaApiResponseInterface
     */
    public function getSummerLeagueGenericTeamRoster(SummerLeagueGenericTeamRosterRequest $request, array $config = [])
    {
        return $this->request($request, $config);
    }

    /**
     * @param SummerLeagueTeamRosterRequest $request
     * @param array $config
     * @return NbaApiResponseInterface
     */
    public function getSummerLeagueTeamRoster(SummerLeagueTeamRosterRequest $request, array $config = [])
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
     * @param ScheduleRequest $request
     * @param array $config
     * @return NbaApiResponseInterface
     */
    public function getSchedule(ScheduleRequest $request, array $config = [])
    {
        return $this->request($request, $config);
    }

    /**
     * @param SummerLeagueScheduleRequest $request
     * @param array $config
     * @return NbaApiResponseInterface
     */
    public function getSummerLeagueSchedule(SummerLeagueScheduleRequest $request, array $config = [])
    {
        return $this->request($request, $config);
    }

    /**
     * @param ScoreboardRequest $request
     * @param array $config
     * @return NbaApiResponseInterface
     */
    public function getScoreboard(ScoreboardRequest $request, array $config = [])
    {
        return $this->request($request, $config);
    }

    /**
     * @param ConferenceStandingsRequest $request
     * @param array $config
     * @return NbaApiResponseInterface
     */
    public function getConferenceStandings(ConferenceStandingsRequest $request, array $config = [])
    {
        return $this->request($request, $config);
    }

    /**
     * @param DivisionStandingsRequest $request
     * @param array $config
     * @return NbaApiResponseInterface
     */
    public function getDivisionStandings(DivisionStandingsRequest $request, array $config = [])
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
     * @param TeamRegularSeasonStatsAndRankingsRequest $request
     * @param array $config
     * @return NbaApiResponseInterface
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
     * @return NbaApiResponseInterface
     */
    public function getSportsMetaTeams(SportsMetaTeamsRequest $request, array $config = [])
    {
        return $this->request($request, $config);
    }
}