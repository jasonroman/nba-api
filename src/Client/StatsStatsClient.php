<?php

namespace JasonRoman\NbaApi\Client;

use JasonRoman\NbaApi\Request\Stats\Widges\Scores\ScoresLeadersRequest;
use JasonRoman\NbaApi\Request\Stats\Widges\Scores\ScoresSidebarRequest;
use JasonRoman\NbaApi\Response\NbaApiResponseInterface;

/**
 * Client that accesses stats.nba.com and endpoints which contain /stats in them.
 * Listed are the series of all possible Stats\Stats requests.
 */
class StatsStatsClient extends AbstractStatsClient
{
}