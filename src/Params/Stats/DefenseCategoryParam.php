<?php declare(strict_types = 1);

namespace JasonRoman\NbaApi\Params\Stats;

class DefenseCategoryParam extends AbstractStatsParam
{
    const OVERALL        = 'Overall';
    const THREE_POINTERS = '3 Pointers';
    const TWO_POINTERS   = '2 Pointers';
    const LT_6_FEET      = 'Less Than 6Ft';
    const LT_10_FEET     = 'Less Than 10Ft';
    const GT_15_FEET     = 'Greater Than 15Ft';

    const OPTIONS = [
        self::OVERALL,
        self::THREE_POINTERS,
        self::TWO_POINTERS,
        self::LT_6_FEET,
        self::LT_10_FEET,
        self::GT_15_FEET,
    ];

    /**
     * {@inheritdoc}
     * @return string
     */
    public static function getDefaultValue(): string
    {
        return self::OVERALL;
    }
}