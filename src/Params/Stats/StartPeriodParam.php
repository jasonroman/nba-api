<?php declare(strict_types = 1);

namespace JasonRoman\NbaApi\Params\Stats;

class StartPeriodParam extends AbstractStatsParam
{
    const MIN = 0;
    const MAX = 14;

    const MIN_ALT = 1;
    const MAX_ALT = 10;

    /**
     * {@inheritdoc}
     * @return int
     */
    public static function getDefaultValue(): int
    {
        return self::MIN;
    }
}