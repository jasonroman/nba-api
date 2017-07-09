<?php
declare(strict_types = 1);

namespace JasonRoman\NbaApi\Params\Stats;

/**
 * Player weight. The NBA website shows less than and greater than, but greater than is actually greater than or equal.
 */
class WeightParam extends AbstractStatsParam
{
    const LT_200  = 'LT 200';
    const GTE_200 = 'GT 200';
    const LT_225  = 'LT 225';
    const GTE_225 = 'GT 225';
    const LT_250  = 'LT 250';
    const GTE_250 = 'GT 250';
    const LT_275  = 'LT 275';
    const GTE_275 = 'GT 275';
    const LT_300  = 'LT 300';
    const GTE_300 = 'GT 300';

    const OPTIONS = [
        self::LT_200,
        self::GTE_200,
        self::LT_225,
        self::GTE_225,
        self::LT_250,
        self::GTE_250,
        self::LT_275,
        self::GTE_275,
        self::LT_300,
        self::GTE_300,
    ];
}