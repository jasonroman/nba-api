<?php

namespace JasonRoman\NbaApi\Request\Stats;

use JasonRoman\NbaApi\Types\LeagueId;

class CommonPlayerInfo extends AbstractStatsApiRequest
{
    /**
     * @var int
     */
    public $playerId;

    /**
     * optional
     * @var string
     */
    public $leagueId = LeagueId::NBA;
}