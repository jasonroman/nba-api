<?php

namespace JasonRoman\NbaApi\Request\Stats;

use JasonRoman\NbaApi\Types\LeagueId;

class CommonPlayoffSeries extends AbstractStatsApiRequest
{
    /**
     * @var int
     */
    public $leagueId = LeagueId::NBA;

    /**
     * @var string
     */
    public $season;
}