<?php

namespace JasonRoman\NbaApi\Request\Stats;

use JasonRoman\NbaApi\Types\LeagueId;
use JasonRoman\NbaApi\Types\SeasonType;

class TeamInfoCommon extends AbstractStatsApiRequest
{
    /**
     * @var string
     */
    public $leagueId = LeagueId::NBA;

    /**
     * @var int
     */
    public $teamId;

    /**
     * @var string;
     */
    public $season;

    /**
     * @var string
     */
    public $seasonType = SeasonType::REGULAR_SEASON;
}