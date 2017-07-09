<?php
declare(strict_types = 1);

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
        self::ALL_STAR,
        self::PRE_SEASON,
        self::REGULAR_SEASON,
        self::PLAYOFFS,
    ];
}