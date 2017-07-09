<?php
declare(strict_types = 1);

namespace JasonRoman\NbaApi\Params\Stats;

class GameSegmentParam extends AbstractStatsParam
{
    const FIRST_HALF  = 'First Half';
    const OVERTIME    = 'Overtime';
    const SECOND_HALF = 'Second Half';

    const OPTIONS = [
        self::FIRST_HALF,
        self::SECOND_HALF,
        self::OVERTIME,
    ];
}