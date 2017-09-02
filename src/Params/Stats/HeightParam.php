<?php declare(strict_types = 1);

namespace JasonRoman\NbaApi\Params\Stats;

/**
 * Player height. The NBA website shows less than and greater than, but greater than is actually greater than or equal.
 */
class HeightParam extends AbstractStatsParam
{
    const LT_6_0   = 'LT 6-0';
    const GTE_6_0  = 'GT 6-0';
    const LT_6_4   = 'LT 6-4';
    const GTE_6_4  = 'GT 6-4';
    const LT_6_7   = 'LT 6-7';
    const GTE_6_7  = 'GT 6-7';
    const LT_6_10  = 'LT 6-10';
    const GTE_6_10 = 'GT 6-10';
    const LT_7_0   = 'LT 7-0';
    const GTE_7_0  = 'GT 7-0';

    const OPTIONS = [
        self::LT_6_0,
        self::GTE_6_0,
        self::LT_6_4,
        self::GTE_6_4,
        self::LT_6_7,
        self::GTE_6_7,
        self::LT_6_10,
        self::GTE_6_10,
        self::LT_7_0,
        self::GTE_7_0,
    ];
}