<?php

namespace JasonRoman\NbaApi\Params;

class LeagueIdParam extends AbstractParam
{
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

    const OPTIONS_NBA = [
        self::NBA,
    ];

    const OPTIONS_NBA_WNBA = [
        self::NBA,
        self::WNBA,
    ];

    /**
     * Default to NBA.
     *
     * @return string
     */
    public function getDefaultValue() : string
    {
        return self::NBA;
    }
}