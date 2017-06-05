<?php

namespace JasonRoman\NbaApi\Request\Stats;

use JasonRoman\NbaApi\Types\LeagueId;
use JasonRoman\NbaApi\Types\SeasonType;

class CommonTeamRoster extends AbstractStatsApiRequest
{
    /**
     * @var int
     */
    public $teamId;

    /**
     * @var string;
     */
    public $season;
}