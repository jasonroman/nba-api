<?php

namespace JasonRoman\NbaApi\Request\Stats;

use JasonRoman\NbaApi\Types\LeagueId;

class CommonTeamYears extends AbstractStatsApiRequest
{
    /**
     * @var string
     */
    public $leagueId = LeagueId::NBA;
}