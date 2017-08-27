<?php
declare(strict_types = 1);

namespace JasonRoman\NbaApi\Params\Stats;

/**
 * Shot clock range. Not yet known if the times are inclusive or some are >=/> and <=/<.
 */
class ShotClockRangeParam extends AbstractStatsParam
{
    const EARLIEST   = '24-22';
    const VERY_EARLY = '22-18 Very Early';
    const EARLY      = '18-15 Early';
    const AVERAGE    = '15-7 Average';
    const LATE       = '7-4 Late';
    const VERY_LATE  = '4-0 Very Late';
    const OFF        = 'ShotClock Off';

    const TIME_24_22 = self::EARLIEST;
    const TIME_22_18 = self::VERY_EARLY;
    const TIME_18_15 = self::EARLY;
    const TIME_15_7  = self::AVERAGE;
    const TIME_7_4   = self::LATE;
    const TIME_4_0   = self::VERY_LATE;
    const TIME_OFF   = self::OFF;

    const OPTIONS = [
        self::EARLIEST,
        self::VERY_EARLY,
        self::EARLY,
        self::AVERAGE,
        self::LATE,
        self::VERY_LATE,
        self::OFF,
    ];
}