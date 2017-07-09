<?php
declare(strict_types = 1);

namespace JasonRoman\NbaApi\Params\Stats;

/**
 * Group Quantity - listing 1-man through 5-man lineups. Although 1 is allowed, it does not return results.
 */
class GroupQuantityParam extends AbstractStatsParam
{
    const MIN = 1;
    const MAX = 5;

    const MIN_LOGICAL = 2;

    /**
     * {@inheritdoc}
     * @return int
     */
    public static function getDefaultValue()
    {
        return self::MAX;
    }
}