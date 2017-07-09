<?php
declare(strict_types = 1);

namespace JasonRoman\NbaApi\Params\Stats;

/**
 * Touch time - assuming 6+ seconds means > 6 seconds, and that 2-6 includes 2 and 6 seconds.
 */
class TouchTimeRangeParam extends AbstractStatsParam
{
    const LT_2_SECONDS       = 'Touch < 2 Seconds';
    const GTE_2_LT_6_SECONDS = 'Touch 2-6 Seconds';
    const GT_6_SECONDS       = 'Touch 6+ Seconds';

    const OPTIONS = [
        self::LT_2_SECONDS,
        self::GTE_2_LT_6_SECONDS,
        self::GT_6_SECONDS,
    ];
}