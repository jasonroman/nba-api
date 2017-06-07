<?php

namespace JasonRoman\NbaApi\Types;

class LeagueId
{
    // for leaguedashlineups - check others
    const FORMAT = '(00)|(20)';

    const NBA      = '00';
    const ABA      = '01';
    const WNBA     = '10';
    const D_LEAGUE = '20';

    const LEAGUE_IDS = [
        self::NBA,
        self::ABA,
        self::WNBA,
        self::D_LEAGUE,
    ];

    /**
     * @var string
     */
    public $value;
}