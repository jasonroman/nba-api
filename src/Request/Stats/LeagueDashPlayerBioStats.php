<?php

namespace JasonRoman\NbaApi\Request\Stats;

use JasonRoman\NbaApi\Types\LeagueId;

class LeagueDashPlayerBioStats extends AbstractStatsApiRequest
{
    // required

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
    public $perMode;

    // optional
    public $poRound;
    public $outcome;
    public $location;
    public $month;
    public $seasonSegment;
    public $dateFrom;
    public $dateTo;
    public $opponentTeamId;
    public $vsConference;
    public $vsDivision;
    public $teamId;
    public $conference;
    public $division;
    public $gameSegment;
    public $period;
    public $shotClockRange;
    public $lastNGames;
    public $gameScope;
    public $playerExperience;
    public $playerPosition;
    public $starterBench;
    public $draftYear;
    public $college;
    public $country;

    // these are optional and appear to have no effect
    public $draftPick;
    public $height;
    public $weight;
}