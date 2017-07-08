<?php
declare(strict_types = 1);

namespace JasonRoman\NbaApi\Params\Stats;

class StartPeriodParam extends AbstractStatsParam
{
    const MIN = 0;
    const MAX = 14;

    /**
     * {@inheritdoc}
     * @return int
     */
    public static function getDefaultValue() : int
    {
        return self::MIN;
    }
}