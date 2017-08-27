<?php

namespace JasonRoman\NbaApi\Params\Data;

/**
 * @todo - check if wnba or dleague/gleague works for any endpoints that use this
 */
class LeagueSlugParam extends AbstractDataParam
{
    // nba team codes by abbreviation
    const NBA            = 'nba';
    const G_LEAGUE       = 'dleague';
    const SUMMER_ORLANDO = 'orlando';
    const SUMMER_VEGAS   = 'vegas';
    const SUMMER_UTAH    = 'utah';

    // standard allowed options
    const OPTIONS = [
        self::NBA,
        self::G_LEAGUE,
        self::SUMMER_ORLANDO,
        self::SUMMER_VEGAS,
        self::SUMMER_UTAH,
    ];

    const OPTIONS_NBA = [
        self::NBA,
    ];

    const OPTIONS_NBA_G_LEAGUE = [
        self::NBA,
        self::G_LEAGUE,
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