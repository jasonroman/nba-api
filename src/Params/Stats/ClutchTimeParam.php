<?php declare(strict_types = 1);

namespace JasonRoman\NbaApi\Params\Stats;

class ClutchTimeParam extends AbstractStatsParam
{
    const LAST_5_MINUTES  = 'Last 5 Minutes';
    const LAST_4_MINUTES  = 'Last 4 Minutes';
    const LAST_3_MINUTES  = 'Last 3 Minutes';
    const LAST_2_MINUTES  = 'Last 2 Minutes';
    const LAST_1_MINUTE   = 'Last 1 Minute';
    const LAST_30_SECONDS = 'Last 30 Seconds';
    const LAST_10_SECONDS = 'Last 10 Seconds';

    const OPTIONS = [
        self::LAST_5_MINUTES,
        self::LAST_4_MINUTES,
        self::LAST_3_MINUTES,
        self::LAST_2_MINUTES,
        self::LAST_1_MINUTE,
        self::LAST_30_SECONDS,
        self::LAST_10_SECONDS,
    ];

    /**
     * {@inheritdoc}
     * @return string
     */
    public static function getDefaultValue(): string
    {
        return self::LAST_5_MINUTES;
    }
}