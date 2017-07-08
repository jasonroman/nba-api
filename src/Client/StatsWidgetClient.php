<?php

namespace JasonRoman\NbaApi\Client;

use JasonRoman\NbaApi\Request\Stats\Widges\Scores\ScoresLeadersRequest;
use JasonRoman\NbaApi\Request\Stats\Widges\Scores\ScoresSidebarRequest;
use JasonRoman\NbaApi\Request\Stats\Widges\Stats\HustleLeadersRequest;
use JasonRoman\NbaApi\Response\NbaApiResponseInterface;

/**
 * Client that accesses stats.nba.com and endpoints which contain /widgets in them.
 * Listed are the series of all possible Stats\Widget requests.
 */
class StatsWidgetClient extends AbstractStatsClient
{
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
}