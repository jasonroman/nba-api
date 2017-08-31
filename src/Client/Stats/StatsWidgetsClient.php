<?php

namespace JasonRoman\NbaApi\Client\Stats;

use JasonRoman\NbaApi\Request\NbaApiRequestInterface;
use JasonRoman\NbaApi\Request\Stats\Widgets\AbstractStatsWidgetsRequest;
use JasonRoman\NbaApi\Request\Stats\Widgets\Games\BoxScoreBreakdownRequest;
use JasonRoman\NbaApi\Request\Stats\Widgets\Homepage\HomepageDailyRequest;
use JasonRoman\NbaApi\Request\Stats\Widgets\Homepage\HomepageDailySummerLeagueRequest;
use JasonRoman\NbaApi\Request\Stats\Widgets\Homepage\HomepageEditorialRequest;
use JasonRoman\NbaApi\Request\Stats\Widgets\Homepage\HomepagePlayoffsRequest;
use JasonRoman\NbaApi\Request\Stats\Widgets\Homepage\HomepageSeasonRequest;
use JasonRoman\NbaApi\Request\Stats\Widgets\Homepage\HomepageSidebarRequest;
use JasonRoman\NbaApi\Request\Stats\Widgets\Players\PlayersLandingInnerRequest;
use JasonRoman\NbaApi\Request\Stats\Widgets\Players\PlayersLandingSidebarRequest;
use JasonRoman\NbaApi\Request\Stats\Widgets\Scores\ScoresLeadersRequest;
use JasonRoman\NbaApi\Request\Stats\Widgets\Scores\ScoresSidebarRequest;
use JasonRoman\NbaApi\Request\Stats\Widgets\Stats\AdvancedLeadersRequest;
use JasonRoman\NbaApi\Request\Stats\Widgets\Stats\HustleLeadersRequest;
use JasonRoman\NbaApi\Request\Stats\Widgets\Teams\TeamsLandingInnerRequest;
use JasonRoman\NbaApi\Request\Stats\Widgets\Teams\TeamsLandingSidebarRequest;
use JasonRoman\NbaApi\Response\NbaApiResponse;

/**
 * Client that accesses stats.nba.com and endpoints which contain /widgets in them.
 * Listed are the series of all possible Stats\Widget requests.
 */
class StatsWidgetsClient extends AbstractStatsClient
{
    /**
     * {@inheritdoc}
     * @throws \InvalidArgumentException if request is not the proper type
     */
    public function request(NbaApiRequestInterface $request, array $config = [])
    {
        if (!$request instanceof AbstractStatsWidgetsRequest) {
            throw new \InvalidArgumentException('Request must be of type AbstractStatsWidgetsRequest');
        }

        // the query string contains from all of the request parameters
        return parent::request($request, $config);
    }

    /**
     * @param BoxScoreBreakdownRequest $request
     * @param array $config
     * @return NbaApiResponse
     */
    public function getBoxScoreBreakdown(BoxScoreBreakdownRequest $request, array $config = [])
    {
        return $this->request($request, $config);
    }

    /**
     * @param HomepageDailyRequest $request
     * @param array $config
     * @return NbaApiResponse
     */
    public function getHomepageDaily(HomepageDailyRequest $request, array $config = [])
    {
        return $this->request($request, $config);
    }

    /**
     * @param HomepageDailySummerLeagueRequest $request
     * @param array $config
     * @return NbaApiResponse
     */
    public function getHomepageDailySummerLeague(HomepageDailySummerLeagueRequest $request, array $config = [])
    {
        return $this->request($request, $config);
    }

    /**
     * @param HomepageEditorialRequest $request
     * @param array $config
     * @return NbaApiResponse
     */
    public function getHomepageEditorial(HomepageEditorialRequest $request, array $config = [])
    {
        return $this->request($request, $config);
    }

    /**
     * @param HomepagePlayoffsRequest $request
     * @param array $config
     * @return NbaApiResponse
     */
    public function getHomepagePlayoffs(HomepagePlayoffsRequest $request, array $config = [])
    {
        return $this->request($request, $config);
    }

    /**
     * @param HomepageSeasonRequest $request
     * @param array $config
     * @return NbaApiResponse
     */
    public function getHomepageSeason(HomepageSeasonRequest $request, array $config = [])
    {
        return $this->request($request, $config);
    }

    /**
     * @param HomepageSidebarRequest $request
     * @param array $config
     * @return NbaApiResponse
     */
    public function getHomepageSidebar(HomepageSidebarRequest $request, array $config = [])
    {
        return $this->request($request, $config);
    }

    /**
     * @param PlayersLandingInnerRequest $request
     * @param array $config
     * @return NbaApiResponse
     */
    public function getPlayersLandingInner(PlayersLandingInnerRequest $request, array $config = [])
    {
        return $this->request($request, $config);
    }

    /**
     * @param PlayersLandingSidebarRequest $request
     * @param array $config
     * @return NbaApiResponse
     */
    public function getPlayersLandingSidebar(PlayersLandingSidebarRequest $request, array $config = [])
    {
        return $this->request($request, $config);
    }

    /**
     * @param ScoresLeadersRequest $request
     * @param array $config
     * @return NbaApiResponse
     */
    public function getScoresLeaders(ScoresLeadersRequest $request, array $config = [])
    {
        return $this->request($request, $config);
    }

    /**
     * @param ScoresSidebarRequest $request
     * @param array $config
     * @return NbaApiResponse
     */
    public function getScoresSidebar(ScoresSidebarRequest $request, array $config = [])
    {
        return $this->request($request, $config);
    }

    /**
     * @param AdvancedLeadersRequest $request
     * @param array $config
     * @return NbaApiResponse
     */
    public function getAdvancedLeaders(AdvancedLeadersRequest $request, array $config = [])
    {
        return $this->request($request, $config);
    }


    /**
     * @param HustleLeadersRequest $request
     * @param array $config
     * @return NbaApiResponse
     */
    public function getHustleLeaders(HustleLeadersRequest $request, array $config = [])
    {
        return $this->request($request, $config);
    }

    /**
     * @param TeamsLandingInnerRequest $request
     * @param array $config
     * @return NbaApiResponse
     */
    public function getTeamsLandingInner(TeamsLandingInnerRequest $request, array $config = [])
    {
        return $this->request($request, $config);
    }

    /**
     * @param TeamsLandingSidebarRequest $request
     * @param array $config
     * @return NbaApiResponse
     */
    public function getTeamsLandingSidebar(TeamsLandingSidebarRequest $request, array $config = [])
    {
        return $this->request($request, $config);
    }
}