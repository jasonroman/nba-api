<?php
declare(strict_types = 1);

namespace JasonRoman\NbaApi\Params\Stats;

class ClosestDefenderDistanceParam extends AbstractStatsParam
{
    const VERY_TIGHT = '0-2 Feet - Very Tight';
    const TIGHT      = '2-4 Feet - Tight';
    const OPEN       = '4-6 Feet - Open';
    const WIDE_OPEN  = '6+ Feet - Wide Open';

    const DISTANCE_0_2_FEET  = self::VERY_TIGHT;
    const DISTANCE_2_4_FEET  = self::TIGHT;
    const DISTANCE_4_6_FEET  = self::OPEN;
    const DISTANCE_GT_6_FEET = self::WIDE_OPEN;

    const OPTIONS = [
        self::VERY_TIGHT,
        self::TIGHT,
        self::OPEN,
        self::WIDE_OPEN,
    ];
}