<?php

namespace JasonRoman\NbaApi\Params;

class LeagueIdParam extends AbstractParam
{
    const FORMAT = '/^\d{2}$/';

    const NBA            = '00';
    const ABA            = '01';
    const WNBA           = '10';
    const SUMMER_ORLANDO = '14';
    const SUMMER_VEGAS   = '15';
    const SUMMER_UTAH    = '16';
    const G_LEAGUE       = '20';

    const OPTIONS = [
        self::NBA,
        self::ABA,
        self::WNBA,
        self::G_LEAGUE,
    ];

    const OPTIONS_ALL = [
        self::NBA,
        self::ABA,
        self::WNBA,
        self::SUMMER_ORLANDO,
        self::SUMMER_VEGAS,
        self::SUMMER_UTAH,
        self::G_LEAGUE,
    ];

    const OPTIONS_NBA = [
        self::NBA,
    ];

    const OPTIONS_NBA_SUMMER = [
        self::NBA,
        self::SUMMER_ORLANDO,
        self::SUMMER_VEGAS,
        self::SUMMER_UTAH,
    ];

    const OPTIONS_NBA_WNBA = [
        self::NBA,
        self::WNBA,
    ];

    const OPTIONS_NBA_WNBA_G_LEAGUE = [
        self::NBA,
        self::WNBA,
        self::G_LEAGUE,
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
    public static function getDefaultValue(): string
    {
        return self::NBA;
    }
}