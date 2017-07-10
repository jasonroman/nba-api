<?php

namespace JasonRoman\NbaApi\Client;

use JasonRoman\NbaApi\Request\Stats\Widges\Scores\ScoresLeadersRequest;
use JasonRoman\NbaApi\Request\Stats\Widges\Scores\ScoresSidebarRequest;
use JasonRoman\NbaApi\Request\StatsProd\StatsCms\Homepage\HomepageRequest;
use JasonRoman\NbaApi\Request\StatsProd\StatsCms\Homepage\SynergyPlayersPlayTypeStatsRequest;
use JasonRoman\NbaApi\Request\StatsProd\StatsCms\Homepage\SynergyTeamsPlayTypeStatsRequest;
use JasonRoman\NbaApi\Request\StatsProd\StatsCms\Rotowire\RotowirePlayerRequest;
use JasonRoman\NbaApi\Request\StatsProd\StatsCms\Rotowire\RotowirePlayersRequest;
use JasonRoman\NbaApi\Response\NbaApiResponseInterface;

/**
 * Client that accesses stats-prod.nba.com and endpoints which contain /statscms in them.
 * Listed are the series of all possible StatsProd\StatsCms requests.
 */
class StatsProdStatsCmsClient extends AbstractStatsProdClient
{
    /**
     * @param HomepageRequest $request
     * @param array $config
     * @return NbaApiResponseInterface
     */
    public function getHomepage(HomepageRequest $request, array $config = [])
    {
        return $this->request($request, $config);
    }

    /**
     * @param SynergyPlayersPlayTypeStatsRequest $request
     * @param array $config
     * @return NbaApiResponseInterface
     */
    public function getSynergyPlayersPlayTypeStats(SynergyPlayersPlayTypeStatsRequest $request, array $config = [])
    {
        return $this->request($request, $config);
    }

    /**
     * @param SynergyTeamsPlayTypeStatsRequest $request
     * @param array $config
     * @return NbaApiResponseInterface
     */
    public function getSynergyTeamsPlayTypeStats(SynergyTeamsPlayTypeStatsRequest $request, array $config = [])
    {
        return $this->request($request, $config);
    }

    /**
     * @param RotowirePlayerRequest $request
     * @param array $config
     * @return NbaApiResponseInterface
     */
    public function getRotowirePlayer(RotowirePlayerRequest $request, array $config = [])
    {
        return $this->request($request, $config);
    }

    /**
     * @param RotowirePlayersRequest $request
     * @param array $config
     * @return NbaApiResponseInterface
     */
    public function getRotowirePlayers(RotowirePlayersRequest $request, array $config = [])
    {
        return $this->request($request, $config);
    }
}