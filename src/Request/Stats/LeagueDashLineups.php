<?php

namespace JasonRoman\NbaApi\Request\Stats;

use JasonRoman\NbaApi\Types\LeagueId;

class LeagueDashLineups extends AbstractStatsApiRequest
{
    /**
     * @var string
     */
    public $season;

    /**
     * @var string
     */
    public $seasonType;

    public $seasonSegment;
    public $month;
    public $dateFrom;
    public $dateTo;
    public $vsConference;
    public $vsDivision;
    public $location;
    public $groupQuantity;
    public $measureType;
    public $perMode;
    public $plusMinus;
    public $paceAdjust;
    public $rank;
    public $outcome;
    public $gameSegment;
    public $period;
    public $lastNGames;
    public $opponentTeamId;

    // optional
    public $leagueId = LeagueId::NBA;
    public $teamId;
    public $conference;
    public $division;
    public $shotClockRange;
    public $poRound;
}