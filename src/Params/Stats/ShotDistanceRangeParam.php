<?php
declare(strict_types = 1);

namespace JasonRoman\NbaApi\Params\Stats;

/**
 * Shot distance range. It appears that only >=10 feet is currently supported.
 */
class ShotDistanceRangeParam extends AbstractStatsParam
{
    const GTE_10_FEET = '>=10.0';

    const OPTIONS = [
        self::GTE_10_FEET,
    ];
}