<?php

namespace JasonRoman\NbaApi\Request\Stats;

use JasonRoman\NbaApi\Types\LeagueId;

class HomePageV2 extends AbstractStatsApiRequest
{
    /**
     * @var string
     */
    public $leagueId = LeagueId::NBA;

    /**
     * @var string
     */
    public $season;

    /**
     * @var string
     */
    public $seasonType;

    /**
     * @var string
     */
    public $gameScope;

    /**
     * @var string
     */
    public $playerScope;

    /**
     * @var string
     */
    public $playerOrTeam;

    /**
     * @var string
     */
    public $statType;
}