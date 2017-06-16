<?php

namespace JasonRoman\NbaApi\Request\Stats\Params;

class LeagueId
{
    const FORMAT          = '^\d{2}$';
    const FORMAT_NBA_WNBA = '/(00)|(20)/'; // for leaguedashlineups - check others

    const NBA      = '00';
    const ABA      = '01';
    const WNBA     = '10';
    const D_LEAGUE = '20';

    const OPTIONS = [
        self::NBA,
        self::ABA,
        self::WNBA,
        self::D_LEAGUE,
    ];

    const OPTIONS_NBA_WNBA = [
        self::NBA,
        self::WNBA,
    ];

    public function getDefaultValue()
    {
        return self::NBA;
    }
}