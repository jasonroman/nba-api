<?php declare(strict_types = 1);

namespace JasonRoman\NbaApi\Params\Stats;

/**
 * Get the month.
 */
class MonthParam extends AbstractStatsParam
{
    // some endpoints require this, but '0' indicates all months; why not just make it not required? who knows...
    const MIN_ALL = 0;

    const MIN = 1;
    const MAX = 12;

    /**
     * {@inheritdoc}
     * @return int
     */
    public static function getDefaultValue(): int
    {
        return self::MIN_ALL;
    }
}