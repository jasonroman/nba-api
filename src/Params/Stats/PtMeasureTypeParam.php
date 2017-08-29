<?php
declare(strict_types = 1);

namespace JasonRoman\NbaApi\Params\Stats;

class PtMeasureTypeParam extends AbstractStatsParam
{
    const CATCH_AND_SHOOT = 'CatchShoot';
    const DEFENSE         = 'Defense';
    const DRIVES          = 'Drives';
    const EFFICIENCY      = 'Efficiency';
    const ELBOW_TOUCH     = 'ElbowTouch';
    const PAINT_TOUCH     = 'PaintTouch';
    const PASSING         = 'Passing';
    const POSSESSIONS     = 'Possessions';
    const POST_TOUCH      = 'PostTouch';
    const PULL_UP_SHOT    = 'PullUpShot';
    const REBOUNDING      = 'Rebounding';
    const SPEED_DISTANCE  = 'SpeedDistance';

    const OPTIONS = [
        self::CATCH_AND_SHOOT,
        self::DEFENSE,
        self::DRIVES,
        self::EFFICIENCY,
        self::ELBOW_TOUCH,
        self::PAINT_TOUCH,
        self::PASSING,
        self::POSSESSIONS,
        self::POST_TOUCH,
        self::PULL_UP_SHOT,
        self::REBOUNDING,
        self::SPEED_DISTANCE,
    ];
}