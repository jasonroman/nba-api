<?php declare(strict_types = 1);

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
        self::ALL,
        self::ALL_AND_ROOKIES,
        self::ROOKIES,
    ];

    /**
     * {@inheritdoc}
     * @return string
     */
    public static function getDefaultValue(): string
    {
        return self::ALL;
    }
}