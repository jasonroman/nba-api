<?php declare(strict_types = 1);

namespace JasonRoman\NbaApi\Params\Stats;

/**
 * Get ranges of distances from the basket; Also can go by zone.
 */
class DistanceRangeParam extends AbstractStatsParam
{
    const RANGE_5_FOOT = '5ft Range';
    const RANGE_8_FOOT = '8ft Range';
    const RANGE_ZONE   = 'By Zone';

    const OPTIONS = [
        self::RANGE_5_FOOT,
        self::RANGE_8_FOOT,
        self::RANGE_ZONE,
    ];

    /**
     * {@inheritdoc}
     * @return string
     */
    public static function getDefaultValue(): string
    {
        return self::RANGE_5_FOOT;
    }
}