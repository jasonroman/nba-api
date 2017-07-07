<?php

namespace JasonRoman\NbaApi\Client;

use JasonRoman\NbaApi\Request\Data\Prod\Game\BoxscoreRequest;
use JasonRoman\NbaApi\Request\Data\Prod\Game\GameBookRequest;
use JasonRoman\NbaApi\Request\Data\Prod\Game\LeadTrackerRequest;
use JasonRoman\NbaApi\Request\Data\Prod\Game\MiniBoxscoreRequest;
use JasonRoman\NbaApi\Request\Data\Prod\Game\PlayByPlayRequest;
use JasonRoman\NbaApi\Request\Data\Prod\Game\PreviewRequest;
use JasonRoman\NbaApi\Request\Data\Prod\Game\RecapRequest;
use JasonRoman\NbaApi\Request\Data\Prod\Player\PlayerGameLogRequest;
use JasonRoman\NbaApi\Request\Data\Prod\Player\PlayerProfileRequest;
use JasonRoman\NbaApi\Request\Data\Prod\Player\PlayerUberStatsRequest;
use JasonRoman\NbaApi\Request\Data\Prod\Playoffs\PlayoffsBracketRequest;
use JasonRoman\NbaApi\Request\Data\Prod\Playoffs\PlayoffSeriesLeaders;
use JasonRoman\NbaApi\Request\Data\Prod\Roster\AllStarRosterRequest;
use JasonRoman\NbaApi\Request\Data\Prod\Roster\LeagueRosterCoachesRequest;
use JasonRoman\NbaApi\Request\Data\Prod\Roster\LeagueRosterPlayersRequest;
use JasonRoman\NbaApi\Request\Data\Prod\Schedule\CalendarRequest;
use JasonRoman\NbaApi\Request\Data\Prod\Schedule\LeagueScheduleRequest;
use JasonRoman\NbaApi\Request\Data\Prod\Scores\ScoreboardRequest;
use JasonRoman\NbaApi\Request\Data\Prod\Standings\ConferenceStandingsRequest;
use JasonRoman\NbaApi\Request\Data\Prod\Standings\DivisionStandingsRequest;
use JasonRoman\NbaApi\Request\Data\Prod\Standings\LeagueStandingsMiniRequest;
use JasonRoman\NbaApi\Request\Data\Prod\Standings\LeagueStandingsRequest;
use JasonRoman\NbaApi\Request\Data\Prod\Stats\TeamStatsLastFiveGamesRequest;
use JasonRoman\NbaApi\Request\Data\Prod\Stats\TeamStatsRankingsRequest;
use JasonRoman\NbaApi\Request\Data\Prod\Team\TeamLeaders2Request;
use JasonRoman\NbaApi\Request\Data\Prod\Team\TeamLeadersRequest;
use JasonRoman\NbaApi\Request\Data\Prod\Team\TeamRoster2Request;
use JasonRoman\NbaApi\Request\Data\Prod\Team\TeamRosterRequest;
use JasonRoman\NbaApi\Request\Data\Prod\Team\TeamSchedule2Request;
use JasonRoman\NbaApi\Request\Data\Prod\Team\TeamScheduleRequest;
use JasonRoman\NbaApi\Request\Data\Prod\Teams\TeamsConfigRequest;
use JasonRoman\NbaApi\Request\Data\Prod\Teams\TeamsRequest;
use JasonRoman\NbaApi\Request\Data\Prod\TodayRequest;
use JasonRoman\NbaApi\Response\ApiResponse;

/**
 * Client that accesses data.nba.com and endpoints which contain /prod in them.
 * Listed are the series of all possible Data\Prod requests.
 */
class DataProdClient extends AbstractDataClient
{
    /**
     * @param TodayRequest $request
     * @param array $config
     * @return ApiResponse
     */
    public function getToday(TodayRequest $request, array $config = [])
    {
        return $this->request($request, $config);
    }

    /**
     * @param BoxscoreRequest $request
     * @param array $config
     * @return ApiResponse
     */
    public function getBoxscore(BoxscoreRequest $request, array $config = [])
    {
        return $this->request($request, $config);
    }

    /**
     * @param GameBookRequest $request
     * @param array $config
     * @return ApiResponse
     */
    public function getGameBook(GameBookRequest $request, array $config = [])
    {
        return $this->request($request, $config);
    }

    /**
     * @param LeadTrackerRequest $request
     * @param array $config
     * @return ApiResponse
     */
    public function getLeadTracker(LeadTrackerRequest $request, array $config = [])
    {
        return $this->request($request, $config);
    }

    /**
     * @param MiniBoxscoreRequest $request
     * @param array $config
     * @return ApiResponse
     */
    public function getMiniBoxscore(MiniBoxscoreRequest $request, array $config = [])
    {
        return $this->request($request, $config);
    }

    /**
     * @param PlayByPlayRequest $request
     * @param array $config
     * @return ApiResponse
     */
    public function getPlayByPlay(PlayByPlayRequest $request, array $config = [])
    {
        return $this->request($request, $config);
    }

    /**
     * @param PreviewRequest $request
     * @param array $config
     * @return ApiResponse
     */
    public function getPreview(PreviewRequest $request, array $config = [])
    {
        return $this->request($request, $config);
    }

    /**
     * @param RecapRequest $request
     * @param array $config
     * @return ApiResponse
     */
    public function getRecap(RecapRequest $request, array $config = [])
    {
        return $this->request($request, $config);
    }

    /**
     * @param PlayerGameLogRequest $request
     * @param array $config
     * @return ApiResponse
     */
    public function getPlayerGameLog(PlayerGameLogRequest $request, array $config = [])
    {
        return $this->request($request, $config);
    }

    /**
     * @param PlayerProfileRequest $request
     * @param array $config
     * @return ApiResponse
     */
    public function getPlayerProfile(PlayerProfileRequest $request, array $config = [])
    {
        return $this->request($request, $config);
    }

    /**
     * @param PlayerUberStatsRequest $request
     * @param array $config
     * @return ApiResponse
     */
    public function getPlayerUberStats(PlayerUberStatsRequest $request, array $config = [])
    {
        return $this->request($request, $config);
    }

    /**
     * @param PlayoffsBracketRequest $request
     * @param array $config
     * @return ApiResponse
     */
    public function getPlayoffsBracket(PlayoffsBracketRequest $request, array $config = [])
    {
        return $this->request($request, $config);
    }

    /**
     * @param PlayoffSeriesLeaders $request
     * @param array $config
     * @return ApiResponse
     */
    public function getPlayoffSeriesLeaders(PlayoffSeriesLeaders $request, array $config = [])
    {
        return $this->request($request, $config);
    }

    /**
     * @param AllStarRosterRequest $request
     * @param array $config
     * @return ApiResponse
     */
    public function getAllStarRoster(AllStarRosterRequest $request, array $config = [])
    {
        return $this->request($request, $config);
    }

    /**
     * @param LeagueRosterCoachesRequest $request
     * @param array $config
     * @return ApiResponse
     */
    public function getLeagueRosterCoaches(LeagueRosterCoachesRequest $request, array $config = [])
    {
        return $this->request($request, $config);
    }

    /**
     * @param LeagueRosterPlayersRequest $request
     * @param array $config
     * @return ApiResponse
     */
    public function getLeagueRosterPlayers(LeagueRosterPlayersRequest $request, array $config = [])
    {
        return $this->request($request, $config);
    }

    /**
     * @param CalendarRequest $request
     * @param array $config
     * @return ApiResponse
     */
    public function getCalendar(CalendarRequest $request, array $config = [])
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
     * @param ScoreboardRequest $request
     * @param array $config
     * @return ApiResponse
     */
    public function getScoreboard(ScoreboardRequest $request, array $config = [])
    {
        return $this->request($request, $config);
    }

    /**
     * @param ConferenceStandingsRequest $request
     * @param array $config
     * @return ApiResponse
     */
    public function getConferenceStandings(ConferenceStandingsRequest $request, array $config = [])
    {
        return $this->request($request, $config);
    }

    /**
     * @param DivisionStandingsRequest $request
     * @param array $config
     * @return ApiResponse
     */
    public function getDivisionStandings(DivisionStandingsRequest $request, array $config = [])
    {
        return $this->request($request, $config);
    }

    /**
     * @param LeagueStandingsMiniRequest $request
     * @param array $config
     * @return ApiResponse
     */
    public function getLeagueStandingsMini(LeagueStandingsMiniRequest $request, array $config = [])
    {
        return $this->request($request, $config);
    }

    /**
     * @param LeagueStandingsRequest $request
     * @param array $config
     * @return ApiResponse
     */
    public function getLeagueStandings(LeagueStandingsRequest $request, array $config = [])
    {
        return $this->request($request, $config);
    }

    /**
     * @param TeamStatsLastFiveGamesRequest $request
     * @param array $config
     * @return ApiResponse
     */
    public function getTeamStatsLastFiveGames(TeamStatsLastFiveGamesRequest $request, array $config = [])
    {
        return $this->request($request, $config);
    }

    /**
     * @param TeamStatsRankingsRequest $request
     * @param array $config
     * @return ApiResponse
     */
    public function getTeamStatsRankings(TeamStatsRankingsRequest $request, array $config = [])
    {
        return $this->request($request, $config);
    }

    /**
     * @param TeamLeaders2Request $request
     * @param array $config
     * @return ApiResponse
     */
    public function getTeamLeaders2(TeamLeaders2Request $request, array $config = [])
    {
        return $this->request($request, $config);
    }

    /**
     * @param TeamLeadersRequest $request
     * @param array $config
     * @return ApiResponse
     */
    public function getTeamLeaders(TeamLeadersRequest $request, array $config = [])
    {
        return $this->request($request, $config);
    }

    /**
     * @param TeamRoster2Request $request
     * @param array $config
     * @return ApiResponse
     */
    public function getTeamRoster2(TeamRoster2Request $request, array $config = [])
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
     * @param TeamSchedule2Request $request
     * @param array $config
     * @return ApiResponse
     */
    public function getTeamSchedule2(TeamSchedule2Request $request, array $config = [])
    {
        return $this->request($request, $config);
    }

    /**
     * @param TeamScheduleRequest $request
     * @param array $config
     * @return ApiResponse
     */
    public function getTeamSchedule(TeamScheduleRequest $request, array $config = [])
    {
        return $this->request($request, $config);
    }

    /**
     * @param TeamsConfigRequest $request
     * @param array $config
     * @return ApiResponse
     */
    public function getTeamsConfig(TeamsConfigRequest $request, array $config = [])
    {
        return $this->request($request, $config);
    }

    /**
     * @param TeamsRequest $request
     * @param array $config
     * @return ApiResponse
     */
    public function getTeams(TeamsRequest $request, array $config = [])
    {
        return $this->request($request, $config);
    }
}