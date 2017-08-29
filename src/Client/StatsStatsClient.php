<?php

namespace JasonRoman\NbaApi\Client;

use JasonRoman\NbaApi\Request\Stats\Stats\AllStar\AllStarBallotPredictorRequest;
use JasonRoman\NbaApi\Request\Stats\Stats\Charts\InfographicFanDuelPlayerRequest;
use JasonRoman\NbaApi\Request\Stats\Stats\Charts\WinProbabilityPlayByPlayRequest;
use JasonRoman\NbaApi\Request\Stats\Stats\Draft\DraftHistoryRequest;
use JasonRoman\NbaApi\Request\Stats\Stats\DraftCombine\DraftCombineDrillResultsRequest;
use JasonRoman\NbaApi\Request\Stats\Stats\DraftCombine\DraftCombineNonStationaryShootingRequest;
use JasonRoman\NbaApi\Request\Stats\Stats\DraftCombine\DraftCombinePlayerMeasurementsRequest;
use JasonRoman\NbaApi\Request\Stats\Stats\DraftCombine\DraftCombineSpotShootingRequest;
use JasonRoman\NbaApi\Request\Stats\Stats\DraftCombine\DraftCombineStatsRequest;
use JasonRoman\NbaApi\Request\Stats\Stats\Game\BoxScoreAdvancedRequest;
use JasonRoman\NbaApi\Request\Stats\Stats\Game\BoxScoreFourFactorsRequest;
use JasonRoman\NbaApi\Request\Stats\Stats\Game\BoxScoreMiscRequest;
use JasonRoman\NbaApi\Request\Stats\Stats\Game\BoxScorePlayerTrackingRequest;
use JasonRoman\NbaApi\Request\Stats\Stats\Game\BoxScoreScoringRequest;
use JasonRoman\NbaApi\Request\Stats\Stats\Game\BoxScoreSummaryRequest;
use JasonRoman\NbaApi\Request\Stats\Stats\Game\BoxScoreTraditionalRequest;
use JasonRoman\NbaApi\Request\Stats\Stats\Game\BoxScoreUsageRequest;
use JasonRoman\NbaApi\Request\Stats\Stats\Game\PlayByPlayMiniRequest;
use JasonRoman\NbaApi\Request\Stats\Stats\Game\PlayByPlayRequest;
use JasonRoman\NbaApi\Request\Stats\Stats\Games\LeagueGameLogRequest;
use JasonRoman\NbaApi\Request\Stats\Stats\GLeague\GLeaguePredictorRequest;
use JasonRoman\NbaApi\Request\Stats\Stats\Homepage\HomepageLeadersRequest;
use JasonRoman\NbaApi\Request\Stats\Stats\Homepage\HomepageRequest;
use JasonRoman\NbaApi\Request\Stats\Stats\Homepage\LeadersTilesRequest;
use JasonRoman\NbaApi\Request\Stats\Stats\Homepage\LeagueLeadersRequest;
use JasonRoman\NbaApi\Request\Stats\Stats\Player\PlayerAwardsRequest;
use JasonRoman\NbaApi\Request\Stats\Stats\Player\PlayerBioStatsRequest;
use JasonRoman\NbaApi\Request\Stats\Stats\Player\PlayerCareerStatsRequest;
use JasonRoman\NbaApi\Request\Stats\Stats\Player\PlayerClutchStatsRequest;
use JasonRoman\NbaApi\Request\Stats\Stats\Player\PlayerCompareStatsRequest;
use JasonRoman\NbaApi\Request\Stats\Stats\Player\PlayerDefenseStatsRequest;
use JasonRoman\NbaApi\Request\Stats\Stats\Player\PlayerFantasyProfileBarGraphRequest;
use JasonRoman\NbaApi\Request\Stats\Stats\Player\PlayerFantasyProfileRequest;
use JasonRoman\NbaApi\Request\Stats\Stats\Player\PlayerGameLogRequest;
use JasonRoman\NbaApi\Request\Stats\Stats\Player\PlayerGameLogsStatsRequest;
use JasonRoman\NbaApi\Request\Stats\Stats\Player\PlayerGameSplitsStatsRequest;
use JasonRoman\NbaApi\Request\Stats\Stats\Player\PlayerGeneralSplitsStatsRequest;
use JasonRoman\NbaApi\Request\Stats\Stats\Player\PlayerInfoRequest;
use JasonRoman\NbaApi\Request\Stats\Stats\Player\PlayerLastNGamesStatsRequest;
use JasonRoman\NbaApi\Request\Stats\Stats\Player\PlayerNextNGamesRequest;
use JasonRoman\NbaApi\Request\Stats\Stats\Player\PlayerOnDetailsRequest;
use JasonRoman\NbaApi\Request\Stats\Stats\Player\PlayerOpponentStatsRequest;
use JasonRoman\NbaApi\Request\Stats\Stats\Player\PlayerPassesStatsRequest;
use JasonRoman\NbaApi\Request\Stats\Stats\Player\PlayerProfileRequest;
use JasonRoman\NbaApi\Request\Stats\Stats\Player\PlayerReboundsStatsRequest;
use JasonRoman\NbaApi\Request\Stats\Stats\Player\PlayerShotChartDetailRequest;
use JasonRoman\NbaApi\Request\Stats\Stats\Player\PlayerShotsStatsRequest;
use JasonRoman\NbaApi\Request\Stats\Stats\Player\PlayerTeamPerformanceStatsRequest;
use JasonRoman\NbaApi\Request\Stats\Stats\Player\PlayerVsPlayerRequest;
use JasonRoman\NbaApi\Request\Stats\Stats\Player\PlayerYearOverYearStatsRequest;
use JasonRoman\NbaApi\Request\Stats\Stats\Players\AllPlayersRequest;
use JasonRoman\NbaApi\Request\Stats\Stats\Players\PlayersCareerStatsRequest;
use JasonRoman\NbaApi\Request\Stats\Stats\Players\PlayersClutchStatsRequest;
use JasonRoman\NbaApi\Request\Stats\Stats\Players\PlayersDefenseStatsRequest;
use JasonRoman\NbaApi\Request\Stats\Stats\Players\PlayersGeneralStatsRequest;
use JasonRoman\NbaApi\Request\Stats\Stats\Players\PlayersHustleLeadersRequest;
use JasonRoman\NbaApi\Request\Stats\Stats\Players\PlayersHustleStatsRequest;
use JasonRoman\NbaApi\Request\Stats\Stats\Players\PlayersShotLocationStatsRequest;
use JasonRoman\NbaApi\Request\Stats\Stats\Players\PlayersShotStatsRequest;
use JasonRoman\NbaApi\Request\Stats\Stats\Players\PlayersTrackingStatsRequest;
use JasonRoman\NbaApi\Request\Stats\Stats\Players\PlayersVsPlayersRequest;
use JasonRoman\NbaApi\Request\Stats\Stats\Playoffs\PlayoffPictureRequest;
use JasonRoman\NbaApi\Request\Stats\Stats\Playoffs\PlayoffSeriesRequest;
use JasonRoman\NbaApi\Request\Stats\Stats\Roster\TeamRosterRequest;
use JasonRoman\NbaApi\Request\Stats\Stats\Scores\ScoreboardMiniRequest;
use JasonRoman\NbaApi\Request\Stats\Stats\Scores\ScoreboardRequest;
use JasonRoman\NbaApi\Request\Stats\Stats\Stats\AssistTrackerStatsRequest;
use JasonRoman\NbaApi\Request\Stats\Stats\Stats\DefenseHubRequest;
use JasonRoman\NbaApi\Request\Stats\Stats\Stats\LineupStatsRequest;
use JasonRoman\NbaApi\Request\Stats\Stats\Team\TeamClutchStatsRequest;
use JasonRoman\NbaApi\Request\Stats\Stats\Team\TeamDetailsRequest;
use JasonRoman\NbaApi\Request\Stats\Stats\Team\TeamFranchiseLeadersRequest;
use JasonRoman\NbaApi\Request\Stats\Stats\Team\TeamGameLogRequest;
use JasonRoman\NbaApi\Request\Stats\Stats\Team\TeamGameSplitsStatsRequest;
use JasonRoman\NbaApi\Request\Stats\Stats\Team\TeamGeneralSplitsStatsRequest;
use JasonRoman\NbaApi\Request\Stats\Stats\Team\TeamHistoricalLeadersRequest;
use JasonRoman\NbaApi\Request\Stats\Stats\Team\TeamInfoRequest;
use JasonRoman\NbaApi\Request\Stats\Stats\Team\TeamLastNGamesStatsRequest;
use JasonRoman\NbaApi\Request\Stats\Stats\Team\TeamLineupStatsRequest;
use JasonRoman\NbaApi\Request\Stats\Stats\Team\TeamOpponentStatsRequest;
use JasonRoman\NbaApi\Request\Stats\Stats\Team\TeamPassesStatsRequest;
use JasonRoman\NbaApi\Request\Stats\Stats\Team\TeamPerformanceStatsRequest;
use JasonRoman\NbaApi\Request\Stats\Stats\Team\TeamPlayerOnOffDetailsRequest;
use JasonRoman\NbaApi\Request\Stats\Stats\Team\TeamPlayerOnOffSummaryRequest;
use JasonRoman\NbaApi\Request\Stats\Stats\Team\TeamPlayerStatsRequest;
use JasonRoman\NbaApi\Request\Stats\Stats\Team\TeamReboundsStatsRequest;
use JasonRoman\NbaApi\Request\Stats\Stats\Team\TeamShootingSplitsStatsRequest;
use JasonRoman\NbaApi\Request\Stats\Stats\Team\TeamShotChartLineupDetailRequest;
use JasonRoman\NbaApi\Request\Stats\Stats\Team\TeamShotsStatsRequest;
use JasonRoman\NbaApi\Request\Stats\Stats\Team\TeamVsPlayerRequest;
use JasonRoman\NbaApi\Request\Stats\Stats\Team\TeamYearOverYearStatsRequest;
use JasonRoman\NbaApi\Request\Stats\Stats\Team\TeamYearsRequest;
use JasonRoman\NbaApi\Request\Stats\Stats\Teams\FranchiseHistoryRequest;
use JasonRoman\NbaApi\Request\Stats\Stats\Teams\TeamsClutchStatsRequest;
use JasonRoman\NbaApi\Request\Stats\Stats\Teams\TeamsDefenseStatsRequest;
use JasonRoman\NbaApi\Request\Stats\Stats\Teams\TeamsGeneralStatsRequest;
use JasonRoman\NbaApi\Request\Stats\Stats\Teams\TeamsHustleLeadersRequest;
use JasonRoman\NbaApi\Request\Stats\Stats\Teams\TeamsHustleStatsRequest;
use JasonRoman\NbaApi\Request\Stats\Stats\Teams\TeamsShotLocationStatsRequest;
use JasonRoman\NbaApi\Request\Stats\Stats\Teams\TeamsShotStatsRequest;
use JasonRoman\NbaApi\Request\Stats\Stats\Teams\TeamsYearByYearStatsRequest;
use JasonRoman\NbaApi\Request\Stats\Stats\Video\VideoEventsRequest;
use JasonRoman\NbaApi\Request\Stats\Stats\Video\VideoStatusRequest;
use JasonRoman\NbaApi\Response\NbaApiResponse;

/**
 * Client that accesses stats.nba.com and endpoints which contain /stats in them.
 * Listed are the series of all possible Stats\Stats requests.
 */
class StatsStatsClient extends AbstractStatsClient
{
    /**
     * @param AllStarBallotPredictorRequest $request
     * @param array $config
     * @return NbaApiResponse
     */
    public function getAllStarBallotPredictor(AllStarBallotPredictorRequest $request, array $config = [])
    {
        return $this->request($request, $config);
    }

    /**
     * @param InfographicFanDuelPlayerRequest $request
     * @param array $config
     * @return NbaApiResponse
     */
    public function getInfographicFanDuelPlayer(InfographicFanDuelPlayerRequest $request, array $config = [])
    {
        return $this->request($request, $config);
    }

    /**
     * @param WinProbabilityPlayByPlayRequest $request
     * @param array $config
     * @return NbaApiResponse
     */
    public function getWinProbabilityPlayByPlay(WinProbabilityPlayByPlayRequest $request, array $config = [])
    {
        return $this->request($request, $config);
    }

    /**
     * @param DraftHistoryRequest $request
     * @param array $config
     * @return NbaApiResponse
     */
    public function getDraftHistory(DraftHistoryRequest $request, array $config = [])
    {
        return $this->request($request, $config);
    }

    /**
     * @param DraftCombineDrillResultsRequest $request
     * @param array $config
     * @return NbaApiResponse
     */
    public function getDraftCombineDrillResults(DraftCombineDrillResultsRequest $request, array $config = [])
    {
        return $this->request($request, $config);
    }

    /**
     * @param DraftCombineNonStationaryShootingRequest $request
     * @param array $config
     * @return NbaApiResponse
     */
    public function getDraftCombineNonStationaryShooting(
        DraftCombineNonStationaryShootingRequest $request,
        array $config = []
    ) {
        return $this->request($request, $config);
    }

    /**
     * @param DraftCombinePlayerMeasurementsRequest $request
     * @param array $config
     * @return NbaApiResponse
     */
    public function getDraftCombinePlayerMeasurementsRequest(
        DraftCombinePlayerMeasurementsRequest $request,
        array $config = []
    ) {
        return $this->request($request, $config);
    }

    /**
     * @param DraftCombineSpotShootingRequest $request
     * @param array $config
     * @return NbaApiResponse
     */
    public function getDraftCombineSpotShooting(DraftCombineSpotShootingRequest $request, array $config = [])
    {
        return $this->request($request, $config);
    }

    /**
     * @param DraftCombineStatsRequest $request
     * @param array $config
     * @return NbaApiResponse
     */
    public function getDraftCombineStats(DraftCombineStatsRequest $request, array $config = [])
    {
        return $this->request($request, $config);
    }

    /**
     * @param BoxScoreAdvancedRequest $request
     * @param array $config
     * @return NbaApiResponse
     */
    public function getBoxScoreAdvanced(BoxScoreAdvancedRequest $request, array $config = [])
    {
        return $this->request($request, $config);
    }

    /**
     * @param BoxScoreFourFactorsRequest $request
     * @param array $config
     * @return NbaApiResponse
     */
    public function getBoxScoreFourFactors(BoxScoreFourFactorsRequest $request, array $config = [])
    {
        return $this->request($request, $config);
    }

    /**
     * @param BoxScoreMiscRequest $request
     * @param array $config
     * @return NbaApiResponse
     */
    public function getBoxScoreMisc(BoxScoreMiscRequest $request, array $config = [])
    {
        return $this->request($request, $config);
    }

    /**
     * @param BoxScorePlayerTrackingRequest $request
     * @param array $config
     * @return NbaApiResponse
     */
    public function getBoxScorePlayerTracking(BoxScorePlayerTrackingRequest $request, array $config = [])
    {
        return $this->request($request, $config);
    }

    /**
     * @param BoxScoreScoringRequest $request
     * @param array $config
     * @return NbaApiResponse
     */
    public function getBoxScoreScoring(BoxScoreScoringRequest $request, array $config = [])
    {
        return $this->request($request, $config);
    }

    /**
     * @param BoxScoreSummaryRequest $request
     * @param array $config
     * @return NbaApiResponse
     */
    public function getBoxScoreSummary(BoxScoreSummaryRequest $request, array $config = [])
    {
        return $this->request($request, $config);
    }

    /**
     * @param BoxScoreTraditionalRequest $request
     * @param array $config
     * @return NbaApiResponse
     */
    public function getBoxScoreTraditional(BoxScoreTraditionalRequest $request, array $config = [])
    {
        return $this->request($request, $config);
    }

    /**
     * @param BoxScoreUsageRequest $request
     * @param array $config
     * @return NbaApiResponse
     */
    public function getBoxScoreUsage(BoxScoreUsageRequest $request, array $config = [])
    {
        return $this->request($request, $config);
    }

    /**
     * @param PlayByPlayMiniRequest $request
     * @param array $config
     * @return NbaApiResponse
     */
    public function getPlayByPlayMini(PlayByPlayMiniRequest $request, array $config = [])
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
     * @param LeagueGameLogRequest $request
     * @param array $config
     * @return NbaApiResponse
     */
    public function getLeagueGameLog(LeagueGameLogRequest $request, array $config = [])
    {
        return $this->request($request, $config);
    }

    /**
     * @param GLeaguePredictorRequest $request
     * @param array $config
     * @return NbaApiResponse
     */
    public function getGLeaguePredictor(GLeaguePredictorRequest $request, array $config = [])
    {
        return $this->request($request, $config);
    }

    /**
     * @param HomepageLeadersRequest $request
     * @param array $config
     * @return NbaApiResponse
     */
    public function getHomepageLeaders(HomepageLeadersRequest $request, array $config = [])
    {
        return $this->request($request, $config);
    }

    /**
     * @param HomepageRequest $request
     * @param array $config
     * @return NbaApiResponse
     */
    public function getHomepage(HomepageRequest $request, array $config = [])
    {
        return $this->request($request, $config);
    }

    /**
     * @param LeadersTilesRequest $request
     * @param array $config
     * @return NbaApiResponse
     */
    public function getLeadersTiles(LeadersTilesRequest $request, array $config = [])
    {
        return $this->request($request, $config);
    }

    /**
     * @param LeagueLeadersRequest $request
     * @param array $config
     * @return NbaApiResponse
     */
    public function getLeagueLeaders(LeagueLeadersRequest $request, array $config = [])
    {
        return $this->request($request, $config);
    }

    /**
     * @param PlayerAwardsRequest $request
     * @param array $config
     * @return NbaApiResponse
     */
    public function getPlayerAwards(PlayerAwardsRequest $request, array $config = [])
    {
        return $this->request($request, $config);
    }

    /**
     * @param PlayerBioStatsRequest $request
     * @param array $config
     * @return NbaApiResponse
     */
    public function getPlayerBioStats(PlayerBioStatsRequest $request, array $config = [])
    {
        return $this->request($request, $config);
    }

    /**
     * @param PlayerCareerStatsRequest $request
     * @param array $config
     * @return NbaApiResponse
     */
    public function getPlayerCareerStats(PlayerCareerStatsRequest $request, array $config = [])
    {
        return $this->request($request, $config);
    }

    /**
     * @param PlayerClutchStatsRequest $request
     * @param array $config
     * @return NbaApiResponse
     */
    public function getPlayerClutchStats(PlayerClutchStatsRequest $request, array $config = [])
    {
        return $this->request($request, $config);
    }

    /**
     * @param PlayerCompareStatsRequest $request
     * @param array $config
     * @return NbaApiResponse
     */
    public function getPlayerCompareStats(PlayerCompareStatsRequest $request, array $config = [])
    {
        return $this->request($request, $config);
    }

    /**
     * @param PlayerDefenseStatsRequest $request
     * @param array $config
     * @return NbaApiResponse
     */
    public function getPlayerDefenseStatsRequest(PlayerDefenseStatsRequest $request, array $config = [])
    {
        return $this->request($request, $config);
    }

    /**
     * @param PlayerFantasyProfileBarGraphRequest $request
     * @param array $config
     * @return NbaApiResponse
     */
    public function getPlayerFantasyProfileBarGraph(PlayerFantasyProfileBarGraphRequest $request, array $config = [])
    {
        return $this->request($request, $config);
    }

    /**
     * @param PlayerFantasyProfileRequest $request
     * @param array $config
     * @return NbaApiResponse
     */
    public function getPlayerFantasyProfile(PlayerFantasyProfileRequest $request, array $config = [])
    {
        return $this->request($request, $config);
    }

    /**
     * @param PlayerGameLogRequest $request
     * @param array $config
     * @return NbaApiResponse
     */
    public function getPlayerGameLog(PlayerGameLogRequest $request, array $config = [])
    {
        return $this->request($request, $config);
    }

    /**
     * @param PlayerGameLogsStatsRequest $request
     * @param array $config
     * @return NbaApiResponse
     */
    public function getPlayerGameLogsStats(PlayerGameLogsStatsRequest $request, array $config = [])
    {
        return $this->request($request, $config);
    }

    /**
     * @param PlayerGameSplitsStatsRequest $request
     * @param array $config
     * @return NbaApiResponse
     */
    public function getPlayerGameSplitsStats(PlayerGameSplitsStatsRequest $request, array $config = [])
    {
        return $this->request($request, $config);
    }

    /**
     * @param PlayerGeneralSplitsStatsRequest $request
     * @param array $config
     * @return NbaApiResponse
     */
    public function getPlayerGeneralSplitsStats(PlayerGeneralSplitsStatsRequest $request, array $config = [])
    {
        return $this->request($request, $config);
    }

    /**
     * @param PlayerInfoRequest $request
     * @param array $config
     * @return NbaApiResponse
     */
    public function getPlayerInfo(PlayerInfoRequest $request, array $config = [])
    {
        return $this->request($request, $config);
    }

    /**
     * @param PlayerLastNGamesStatsRequest $request
     * @param array $config
     * @return NbaApiResponse
     */
    public function getPlayerLastNGamesStats(PlayerLastNGamesStatsRequest $request, array $config = [])
    {
        return $this->request($request, $config);
    }

    /**
     * @param PlayerNextNGamesRequest $request
     * @param array $config
     * @return NbaApiResponse
     */
    public function getPlayerNextNGames(PlayerNextNGamesRequest $request, array $config = [])
    {
        return $this->request($request, $config);
    }

    /**
     * @param PlayerOnDetailsRequest $request
     * @param array $config
     * @return NbaApiResponse
     */
    public function getPlayerOnDetails(PlayerOnDetailsRequest $request, array $config = [])
    {
        return $this->request($request, $config);
    }

    /**
     * @param PlayerOpponentStatsRequest $request
     * @param array $config
     * @return NbaApiResponse
     */
    public function getPlayerOpponentStats(PlayerOpponentStatsRequest $request, array $config = [])
    {
        return $this->request($request, $config);
    }

    /**
     * @param PlayerPassesStatsRequest $request
     * @param array $config
     * @return NbaApiResponse
     */
    public function getPlayerPassesStats(PlayerPassesStatsRequest $request, array $config = [])
    {
        return $this->request($request, $config);
    }

    /**
     * @param PlayerProfileRequest $request
     * @param array $config
     * @return NbaApiResponse
     */
    public function getPlayerProfile(PlayerProfileRequest $request, array $config = [])
    {
        return $this->request($request, $config);
    }

    /**
     * @param PlayerReboundsStatsRequest $request
     * @param array $config
     * @return NbaApiResponse
     */
    public function getPlayerReboundsStats(PlayerReboundsStatsRequest $request, array $config = [])
    {
        return $this->request($request, $config);
    }

    /**
     * @param PlayerShotChartDetailRequest $request
     * @param array $config
     * @return NbaApiResponse
     */
    public function getPlayerShotChartDetail(PlayerShotChartDetailRequest $request, array $config = [])
    {
        return $this->request($request, $config);
    }

    /**
     * @param PlayerShotsStatsRequest $request
     * @param array $config
     * @return NbaApiResponse
     */
    public function getPlayerShotsStats(PlayerShotsStatsRequest $request, array $config = [])
    {
        return $this->request($request, $config);
    }

    /**
     * @param PlayerTeamPerformanceStatsRequest $request
     * @param array $config
     * @return NbaApiResponse
     */
    public function getPlayerTeamPerformanceStats(PlayerTeamPerformanceStatsRequest $request, array $config = [])
    {
        return $this->request($request, $config);
    }

    /**
     * @param PlayerVsPlayerRequest $request
     * @param array $config
     * @return NbaApiResponse
     */
    public function getPlayerVsPlayer(PlayerVsPlayerRequest $request, array $config = [])
    {
        return $this->request($request, $config);
    }

    /**
     * @param PlayerYearOverYearStatsRequest $request
     * @param array $config
     * @return NbaApiResponse
     */
    public function getPlayerYearOverYearStats(PlayerYearOverYearStatsRequest $request, array $config = [])
    {
        return $this->request($request, $config);
    }

    /**
     * @param AllPlayersRequest $request
     * @param array $config
     * @return NbaApiResponse
     */
    public function getAllPlayers(AllPlayersRequest $request, array $config = [])
    {
        return $this->request($request, $config);
    }

    /**
     * @param PlayersCareerStatsRequest $request
     * @param array $config
     * @return NbaApiResponse
     */
    public function getPlayersCareerStats(PlayersCareerStatsRequest $request, array $config = [])
    {
        return $this->request($request, $config);
    }

    /**
     * @param PlayersClutchStatsRequest $request
     * @param array $config
     * @return NbaApiResponse
     */
    public function getPlayersClutchStats(PlayersClutchStatsRequest $request, array $config = [])
    {
        return $this->request($request, $config);
    }

    /**
     * @param PlayersDefenseStatsRequest $request
     * @param array $config
     * @return NbaApiResponse
     */
    public function getPlayersDefenseStats(PlayersDefenseStatsRequest $request, array $config = [])
    {
        return $this->request($request, $config);
    }

    /**
     * @param PlayersGeneralStatsRequest $request
     * @param array $config
     * @return NbaApiResponse
     */
    public function getPlayersGeneralStats(PlayersGeneralStatsRequest $request, array $config = [])
    {
        return $this->request($request, $config);
    }

    /**
     * @param PlayersHustleLeadersRequest $request
     * @param array $config
     * @return NbaApiResponse
     */
    public function getPlayersHustleLeaders(PlayersHustleLeadersRequest $request, array $config = [])
    {
        return $this->request($request, $config);
    }

    /**
     * @param PlayersHustleStatsRequest $request
     * @param array $config
     * @return NbaApiResponse
     */
    public function getPlayersHustleStats(PlayersHustleStatsRequest $request, array $config = [])
    {
        return $this->request($request, $config);
    }

    /**
     * @param PlayersShotLocationStatsRequest $request
     * @param array $config
     * @return NbaApiResponse
     */
    public function getPlayersShotLocationStats(PlayersShotLocationStatsRequest $request, array $config = [])
    {
        return $this->request($request, $config);
    }

    /**
     * @param PlayersShotStatsRequest $request
     * @param array $config
     * @return NbaApiResponse
     */
    public function getPlayersShotStats(PlayersShotStatsRequest $request, array $config = [])
    {
        return $this->request($request, $config);
    }

    /**
     * @param PlayersTrackingStatsRequest $request
     * @param array $config
     * @return NbaApiResponse
     */
    public function getPlayersTrackingStats(PlayersTrackingStatsRequest $request, array $config = [])
    {
        return $this->request($request, $config);
    }

    /**
     * @param PlayersVsPlayersRequest $request
     * @param array $config
     * @return NbaApiResponse
     */
    public function getPlayersVsPlayers(PlayersVsPlayersRequest $request, array $config = [])
    {
        return $this->request($request, $config);
    }

    /**
     * @param PlayoffPictureRequest $request
     * @param array $config
     * @return NbaApiResponse
     */
    public function getPlayoffPicture(PlayoffPictureRequest $request, array $config = [])
    {
        return $this->request($request, $config);
    }

    /**
     * @param PlayoffSeriesRequest $request
     * @param array $config
     * @return NbaApiResponse
     */
    public function getPlayoffSeries(PlayoffSeriesRequest $request, array $config = [])
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
     * @param ScoreboardMiniRequest $request
     * @param array $config
     * @return NbaApiResponse
     */
    public function getScoreboardMini(ScoreboardMiniRequest $request, array $config = [])
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
     * @param AssistTrackerStatsRequest $request
     * @param array $config
     * @return NbaApiResponse
     */
    public function getAssistTrackerStats(AssistTrackerStatsRequest $request, array $config = [])
    {
        return $this->request($request, $config);
    }

    /**
     * Set a longer timeout as this request seems to take awhile...
     *
     * @param DefenseHubRequest $request
     * @param array $config
     * @return NbaApiResponse
     */
    public function getDefenseHub(DefenseHubRequest $request, array $config = [])
    {
        return $this->request($request, array_merge(['timeout' => 30], $config));
    }

    /**
     * @param LineupStatsRequest $request
     * @param array $config
     * @return NbaApiResponse
     */
    public function getLineupStats(LineupStatsRequest $request, array $config = [])
    {
        return $this->request($request, $config);
    }

    /**
     * @param TeamClutchStatsRequest $request
     * @param array $config
     * @return NbaApiResponse
     */
    public function getTeamClutchStats(TeamClutchStatsRequest $request, array $config = [])
    {
        return $this->request($request, $config);
    }

    /**
     * @param TeamDetailsRequest $request
     * @param array $config
     * @return NbaApiResponse
     */
    public function getTeamDetails(TeamDetailsRequest $request, array $config = [])
    {
        return $this->request($request, $config);
    }

    /**
     * @param TeamFranchiseLeadersRequest $request
     * @param array $config
     * @return NbaApiResponse
     */
    public function getTeamFranchiseLeaders(TeamFranchiseLeadersRequest $request, array $config = [])
    {
        return $this->request($request, $config);
    }

    /**
     * @param TeamGameLogRequest $request
     * @param array $config
     * @return NbaApiResponse
     */
    public function getTeamGameLog(TeamGameLogRequest $request, array $config = [])
    {
        return $this->request($request, $config);
    }

    /**
     * @param TeamGameSplitsStatsRequest $request
     * @param array $config
     * @return NbaApiResponse
     */
    public function getTeamGameSplitsStats(TeamGameSplitsStatsRequest $request, array $config = [])
    {
        return $this->request($request, $config);
    }

    /**
     * @param TeamGeneralSplitsStatsRequest $request
     * @param array $config
     * @return NbaApiResponse
     */
    public function getTeamGeneralSplitsStats(TeamGeneralSplitsStatsRequest $request, array $config = [])
    {
        return $this->request($request, $config);
    }

    /**
     * @param TeamHistoricalLeadersRequest $request
     * @param array $config
     * @return NbaApiResponse
     */
    public function getTeamHistoricalLeaders(TeamHistoricalLeadersRequest $request, array $config = [])
    {
        return $this->request($request, $config);
    }

    /**
     * @param TeamInfoRequest $request
     * @param array $config
     * @return NbaApiResponse
     */
    public function getTeamInfo(TeamInfoRequest $request, array $config = [])
    {
        return $this->request($request, $config);
    }

    /**
     * @param TeamLastNGamesStatsRequest $request
     * @param array $config
     * @return NbaApiResponse
     */
    public function getTeamLastNGamesStats(TeamLastNGamesStatsRequest $request, array $config = [])
    {
        return $this->request($request, $config);
    }

    /**
     * @param TeamLineupStatsRequest $request
     * @param array $config
     * @return NbaApiResponse
     */
    public function getTeamLineupStats(TeamLineupStatsRequest $request, array $config = [])
    {
        return $this->request($request, $config);
    }

    /**
     * @param TeamOpponentStatsRequest $request
     * @param array $config
     * @return NbaApiResponse
     */
    public function getTeamOpponentStats(TeamOpponentStatsRequest $request, array $config = [])
    {
        return $this->request($request, $config);
    }

    /**
     * @param TeamPassesStatsRequest $request
     * @param array $config
     * @return NbaApiResponse
     */
    public function getTeamPassesStats(TeamPassesStatsRequest $request, array $config = [])
    {
        return $this->request($request, $config);
    }

    /**
     * @param TeamPerformanceStatsRequest $request
     * @param array $config
     * @return NbaApiResponse
     */
    public function getTeamPerformanceStats(TeamPerformanceStatsRequest $request, array $config = [])
    {
        return $this->request($request, $config);
    }

    /**
     * @param TeamPlayerOnOffDetailsRequest $request
     * @param array $config
     * @return NbaApiResponse
     */
    public function getTeamPlayerOnOffDetails(TeamPlayerOnOffDetailsRequest $request, array $config = [])
    {
        return $this->request($request, $config);
    }

    /**
     * @param TeamPlayerOnOffSummaryRequest $request
     * @param array $config
     * @return NbaApiResponse
     */
    public function getTeamPlayerOnOffSummary(TeamPlayerOnOffSummaryRequest $request, array $config = [])
    {
        return $this->request($request, $config);
    }

    /**
     * @param TeamPlayerStatsRequest $request
     * @param array $config
     * @return NbaApiResponse
     */
    public function getTeamPlayerStats(TeamPlayerStatsRequest $request, array $config = [])
    {
        return $this->request($request, $config);
    }

    /**
     * @param TeamReboundsStatsRequest $request
     * @param array $config
     * @return NbaApiResponse
     */
    public function getTeamReboundsStats(TeamReboundsStatsRequest $request, array $config = [])
    {
        return $this->request($request, $config);
    }

    /**
     * @param TeamShootingSplitsStatsRequest $request
     * @param array $config
     * @return NbaApiResponse
     */
    public function getTeamShootingSplitsStats(TeamShootingSplitsStatsRequest $request, array $config = [])
    {
        return $this->request($request, $config);
    }

    /**
     * @param TeamShotChartLineupDetailRequest $request
     * @param array $config
     * @return NbaApiResponse
     */
    public function getTeamShotChartLineupDetail(TeamShotChartLineupDetailRequest $request, array $config = [])
    {
        return $this->request($request, $config);
    }

    /**
     * @param TeamShotsStatsRequest $request
     * @param array $config
     * @return NbaApiResponse
     */
    public function getTeamShotsStats(TeamShotsStatsRequest $request, array $config = [])
    {
        return $this->request($request, $config);
    }

    /**
     * @param TeamVsPlayerRequest $request
     * @param array $config
     * @return NbaApiResponse
     */
    public function getTeamVsPlayer(TeamVsPlayerRequest $request, array $config = [])
    {
        return $this->request($request, $config);
    }

    /**
     * @param TeamYearOverYearStatsRequest $request
     * @param array $config
     * @return NbaApiResponse
     */
    public function getTeamYearOverYearStats(TeamYearOverYearStatsRequest $request, array $config = [])
    {
        return $this->request($request, $config);
    }

    /**
     * @param TeamYearsRequest $request
     * @param array $config
     * @return NbaApiResponse
     */
    public function getTeamYears(TeamYearsRequest $request, array $config = [])
    {
        return $this->request($request, $config);
    }

    /**
     * @param FranchiseHistoryRequest $request
     * @param array $config
     * @return NbaApiResponse
     */
    public function getFranchiseHistory(FranchiseHistoryRequest $request, array $config = [])
    {
        return $this->request($request, $config);
    }

    /**
     * @param TeamsClutchStatsRequest $request
     * @param array $config
     * @return NbaApiResponse
     */
    public function getTeamsClutchStats(TeamsClutchStatsRequest $request, array $config = [])
    {
        return $this->request($request, $config);
    }

    /**
     * @param TeamsDefenseStatsRequest $request
     * @param array $config
     * @return NbaApiResponse
     */
    public function getTeamsDefenseStats(TeamsDefenseStatsRequest $request, array $config = [])
    {
        return $this->request($request, $config);
    }

    /**
     * @param TeamsGeneralStatsRequest $request
     * @param array $config
     * @return NbaApiResponse
     */
    public function getTeamsGeneralStats(TeamsGeneralStatsRequest $request, array $config = [])
    {
        return $this->request($request, $config);
    }

    /**
     * @param TeamsHustleLeadersRequest $request
     * @param array $config
     * @return NbaApiResponse
     */
    public function getTeamsHustleLeaders(TeamsHustleLeadersRequest $request, array $config = [])
    {
        return $this->request($request, $config);
    }

    /**
     * @param TeamsHustleStatsRequest $request
     * @param array $config
     * @return NbaApiResponse
     */
    public function getTeamsHustleStats(TeamsHustleStatsRequest $request, array $config = [])
    {
        return $this->request($request, $config);
    }

    /**
     * @param TeamsShotLocationStatsRequest $request
     * @param array $config
     * @return NbaApiResponse
     */
    public function getTeamsShotLocationStats(TeamsShotLocationStatsRequest $request, array $config = [])
    {
        return $this->request($request, $config);
    }

    /**
     * @param TeamsShotStatsRequest $request
     * @param array $config
     * @return NbaApiResponse
     */
    public function getTeamsShotStats(TeamsShotStatsRequest $request, array $config = [])
    {
        return $this->request($request, $config);
    }

    /**
     * @param TeamsYearByYearStatsRequest $request
     * @param array $config
     * @return NbaApiResponse
     */
    public function getTeamsYearByYearStats(TeamsYearByYearStatsRequest $request, array $config = [])
    {
        return $this->request($request, $config);
    }

    /**
     * @param VideoEventsRequest $request
     * @param array $config
     * @return NbaApiResponse
     */
    public function getVideoEvents(VideoEventsRequest $request, array $config = [])
    {
        return $this->request($request, $config);
    }

    /**
     * @param VideoStatusRequest $request
     * @param array $config
     * @return NbaApiResponse
     */
    public function getVideoStatus(VideoStatusRequest $request, array $config = [])
    {
        return $this->request($request, $config);
    }
}