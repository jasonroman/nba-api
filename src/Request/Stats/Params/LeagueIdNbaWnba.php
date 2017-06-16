<?php

namespace JasonRoman\NbaApi\Request\Stats\Params;

class LeagueIdNbaWnba extends LeagueId
{
    // for leaguedashlineups - check others
    const FORMAT = self::FORMAT_NBA_WNBA;

    const LEAGUE_IDS = [
        self::NBA,
        self::WNBA
    ];

    /**
     * @var string
     */
    public $value;
}