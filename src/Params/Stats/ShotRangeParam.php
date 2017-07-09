<?php
declare(strict_types = 1);

namespace JasonRoman\NbaApi\Params\Stats;

class ShotRangeParam extends AbstractStatsParam
{
    const CATCH_AND_SHOOT   = 'Catch and Shoot';
    const LESS_THAN_10_FEET = 'Less Than 10 ft';
    const OVERALL           = 'Overall';
    const PULLUPS           = 'Pullups';

    const OPTIONS = [
        self::OVERALL,
        self::CATCH_AND_SHOOT,
        self::LESS_THAN_10_FEET,
        self::PULLUPS,
    ];
}