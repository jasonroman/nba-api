<?php

namespace JasonRoman\NbaApi\Request\Stats;

use JasonRoman\NbaApi\Types\LeagueId;

class DraftHistory extends AbstractDraftCombine
{
    /**
     * required
     * @var int
     */
    public $leagueId = LeagueId::NBA;

    // rest are optional, and not error-checked

    /**
     * 4-digit year
     * @var string
     */
    public $season;

    /**
     * @var
     */
    public $teamId;

    public $roundNum;

    public $roundPick;

    public $overallPick;

    public $topX;

    public $college;
}