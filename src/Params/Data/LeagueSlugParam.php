<?php

namespace JasonRoman\NbaApi\Params\Data;

class LeagueSlugParam extends AbstractDataParam
{
    // nba team codes by abbreviation
    const NBA            = 'nba';
    const SUMMER_ORLANDO = 'orlando';
    const SUMMER_VEGAS   = 'vegas';
    const SUMMER_UTAH    = 'utah';

    // standard allowed options
    const OPTIONS = [
        self::NBA,
        self::SUMMER_ORLANDO,
        self::SUMMER_VEGAS,
        self::SUMMER_UTAH,
    ];

    /**
     * Default to NBA.
     *
     * @return string
     */
    public static function getDefaultValue() : string
    {
        return self::NBA;
    }
}