<?php

namespace JasonRoman\NbaApi\Request\Stats;

use JasonRoman\NbaApi\Types\LeagueId;

class HomePageLeaders extends AbstractStatsApiRequest
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
    public $statCategory;

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
}