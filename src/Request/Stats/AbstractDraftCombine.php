<?php

namespace JasonRoman\NbaApi\Request\Stats;

use JasonRoman\NbaApi\Types\LeagueId;

class AbstractDraftCombine extends AbstractStatsApiRequest
{
    /**
     * @var string
     */
    public $leagueId = LeagueId::NBA;

    /**
     * @var string;
     */
    public $seasonYear;
}