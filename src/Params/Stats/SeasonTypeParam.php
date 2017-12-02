<?php declare(strict_types = 1);

namespace JasonRoman\NbaApi\Params\Stats;

class SeasonTypeParam extends AbstractStatsParam
{
    const ALL_STAR       = 'All Star';
    const ALL_STAR_ALT   = 'All-Star';
    const PRE_SEASON     = 'Pre Season';
    const REGULAR_SEASON = 'Regular Season';
    const PLAYOFFS       = 'Playoffs';

    const OPTIONS = [
        self::PRE_SEASON,
        self::REGULAR_SEASON,
        self::PLAYOFFS,
    ];

    const OPTIONS_WITH_ALL_STAR = [
        self::PRE_SEASON,
        self::REGULAR_SEASON,
        self::PLAYOFFS,
        self::ALL_STAR,
    ];

    const OPTIONS_WITH_ALL_STAR_ALT = [
        self::PRE_SEASON,
        self::REGULAR_SEASON,
        self::PLAYOFFS,
        self::ALL_STAR_ALT,
    ];

    const OPTIONS_WITH_BOTH_ALL_STAR = [
        self::PRE_SEASON,
        self::REGULAR_SEASON,
        self::PLAYOFFS,
        self::ALL_STAR,
        self::ALL_STAR_ALT,
    ];

    /**
     * {@inheritdoc}
     * @return int
     */
    public static function getDefaultValue(): string
    {
        return self::REGULAR_SEASON;
    }
}