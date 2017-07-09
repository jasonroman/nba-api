<?php
declare(strict_types = 1);

namespace JasonRoman\NbaApi\Params\Stats;

/**
 * Scope - seems to be unused on main stats.nba.com site, but still works passing in Rookies.
 */
class ScopeParam extends AbstractStatsParam
{
    // S seems to be all, RS seems to be unused
    const ALL             = 'S';
    const ALL_AND_ROOKIES = 'RS';
    const ROOKIES         = 'Rookies';

    const OPTIONS = [
        self::ROOKIES,
        self::SOPHOMORES,
        self::ROOKIES_AND_SOPHOMORES,
    ];

    public static function getDefaultValue()
    {
        return self::ALL;
    }
}