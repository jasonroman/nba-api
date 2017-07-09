<?php
declare(strict_types = 1);

namespace JasonRoman\NbaApi\Params\Stats;

class MeasureTypeParam extends AbstractStatsParam
{
    const ADVANCED     = 'Advanced';
    const BASE         = 'Base';
    const DEFENSE      = 'Defense';
    const FOUR_FACTORS = 'Four Factors';
    const MISC         = 'Misc';
    const OPPONENT     = 'Opponent';
    const SCORING      = 'Scoring';
    const USAGE        = 'Usage';

    const OPTIONS = [
        self::BASE,
        self::ADVANCED,
        self::DEFENSE,
        self::FOUR_FACTORS,
        self::MISC,
        self::OPPONENT,
        self::SCORING,
        self::USAGE,
    ];

    const OPTIONS_CLUTCH = [
        self::BASE,
        self::ADVANCED,
        self::MISC,
        self::SCORING,
        self::USAGE,
    ];
}