<?php

namespace JasonRoman\NbaApi\Request\Stats;

use JasonRoman\NbaApi\Types\LeagueId;

class FranchiseHistory extends AbstractStatsApiRequest
{
    /**
     * @var string
     */
    public $leagueId = LeagueId::NBA;
}