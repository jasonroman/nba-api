<?php

namespace JasonRoman\NbaApi\Client;

use JasonRoman\NbaApi\Request\Stats\Widges\Players\HomepageDailyRequest;
use JasonRoman\NbaApi\Request\Stats\Widges\Players\HomepageDailySummerLeagueRequest;
use JasonRoman\NbaApi\Request\Stats\Widges\Players\HomepageEditorialRequest;
use JasonRoman\NbaApi\Request\Stats\Widges\Players\HomepagePlayoffsRequest;
use JasonRoman\NbaApi\Request\Stats\Widges\Players\HomepageSeasonRequest;
use JasonRoman\NbaApi\Request\Stats\Widges\Players\HomepageSidebarRequest;
use JasonRoman\NbaApi\Request\Stats\Widges\Players\PlayersLandingInnerRequest;
use JasonRoman\NbaApi\Request\Stats\Widges\Players\PlayersLandingSidebarRequest;
use JasonRoman\NbaApi\Request\Stats\Widges\Scores\ScoresLeadersRequest;
use JasonRoman\NbaApi\Request\Stats\Widges\Scores\ScoresSidebarRequest;
use JasonRoman\NbaApi\Request\Stats\Widges\Stats\AdvancedLeadersRequest;
use JasonRoman\NbaApi\Request\Stats\Widges\Stats\HustleLeadersRequest;
use JasonRoman\NbaApi\Request\Stats\Widges\Teams\TeamsLandingInnerRequest;
use JasonRoman\NbaApi\Request\Stats\Widges\Teams\TeamsLandingSidebarRequest;
use JasonRoman\NbaApi\Response\NbaApiResponseInterface;

/**
 * Client that accesses stats.nba.com and endpoints which contain /widgets in them.
 * Listed are the series of all possible Stats\Widget requests.
 */
class StatsWidgetClient extends AbstractStatsClient
{
    /**
     * @param HomepageDailyRequest $request
     * @param array $config
     * @return NbaApiResponseInterface
     */
    public function getHomepageDaily(HomepageDailyRequest $request, array $config = [])
    {
        return $this->request($request, $config);
    }

    /**
     * @param HomepageDailySummerLeagueRequest $request
     * @param array $config
     * @return NbaApiResponseInterface
     */
    public function getHomepageDailySummerLeague(HomepageDailySummerLeagueRequest $request, array $config = [])
    {
        return $this->request($request, $config);
    }

    /**
     * @param HomepageEditorialRequest $request
     * @param array $config
     * @return NbaApiResponseInterface
     */
    public function getHomepageEditorial(HomepageEditorialRequest $request, array $config = [])
    {
        return $this->request($request, $config);
    }

    /**
     * @param HomepagePlayoffsRequest $request
     * @param array $config
     * @return NbaApiResponseInterface
     */
    public function getHomepagePlayoffs(HomepagePlayoffsRequest $request, array $config = [])
    {
        return $this->request($request, $config);
    }

    /**
     * @param HomepageSeasonRequest $request
     * @param array $config
     * @return NbaApiResponseInterface
     */
    public function getHomepageSeason(HomepageSeasonRequest $request, array $config = [])
    {
        return $this->request($request, $config);
    }

    /**
     * @param HomepageSidebarRequest $request
     * @param array $config
     * @return NbaApiResponseInterface
     */
    public function getHomepageSidebar(HomepageSidebarRequest $request, array $config = [])
    {
        return $this->request($request, $config);
    }

    /**
     * @param PlayersLandingInnerRequest $request
     * @param array $config
     * @return NbaApiResponseInterface
     */
    public function getPlayersLandingInner(PlayersLandingInnerRequest $request, array $config = [])
    {
        return $this->request($request, $config);
    }

    /**
     * @param PlayersLandingSidebarRequest $request
     * @param array $config
     * @return NbaApiResponseInterface
     */
    public function getPlayersLandingSidebar(PlayersLandingSidebarRequest $request, array $config = [])
    {
        return $this->request($request, $config);
    }

    /**
     * @param ScoresLeadersRequest $request
     * @param array $config
     * @return NbaApiResponseInterface
     */
    public function getScoresLeaders(ScoresLeadersRequest $request, array $config = [])
    {
        return $this->request($request, $config);
    }

    /**
     * @param ScoresSidebarRequest $request
     * @param array $config
     * @return NbaApiResponseInterface
     */
    public function getScoresSidebar(ScoresSidebarRequest $request, array $config = [])
    {
        return $this->request($request, $config);
    }

    /**
     * @param AdvancedLeadersRequest $request
     * @param array $config
     * @return NbaApiResponseInterface
     */
    public function getAdvancedLeaders(AdvancedLeadersRequest $request, array $config = [])
    {
        return $this->request($request, $config);
    }


    /**
     * @param HustleLeadersRequest $request
     * @param array $config
     * @return NbaApiResponseInterface
     */
    public function getHustleLeaders(HustleLeadersRequest $request, array $config = [])
    {
        return $this->request($request, $config);
    }

    /**
     * @param TeamsLandingInnerRequest $request
     * @param array $config
     * @return NbaApiResponseInterface
     */
    public function getTeamsLandingInner(TeamsLandingInnerRequest $request, array $config = [])
    {
        return $this->request($request, $config);
    }

    /**
     * @param TeamsLandingSidebarRequest $request
     * @param array $config
     * @return NbaApiResponseInterface
     */
    public function getTeamsLandingSidebar(TeamsLandingSidebarRequest $request, array $config = [])
    {
        return $this->request($request, $config);
    }
}