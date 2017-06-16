<?php

namespace JasonRoman\NbaApi\Request\Stats;

use JasonRoman\NbaApi\Types\LeagueId;
use JasonRoman\NbaApi\Types\PerModeTotalsPerGame;
use JasonRoman\NbaApi\Types\SeasonType;
use JasonRoman\NbaApi\Types\TeamId;

class TeamYearByYearStats extends AbstractStatsApiRequest
{
    /**
     * @var LeagueId
     */
    public $leagueId;

    /**
     * @var SeasonType
     */
    public $seasonType;

    /**
     * @var PerModeTotalsPerGame
     */
    public $perMode;

    /**
     * @var TeamId
     */
    public $teamId;
}