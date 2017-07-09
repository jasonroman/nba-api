<?php
declare(strict_types = 1);

namespace JasonRoman\NbaApi\Params\Stats;

/**
 * Period - use 0 for all periods.
 */
class PeriodParam extends AbstractStatsParam
{
    const MIN_ALL = 0;

    const MIN = 1;
    const MAX = 14;

    /**
     * {@inheritdoc}
     * @return int
     */
    public static function getDefaultValue() : int
    {
        return self::MIN_ALL;
    }
}