<?php declare(strict_types = 1);

namespace JasonRoman\NbaApi\Params\StatsProd;

class CategoryParam extends AbstractStatsProdParam
{
    const CUT                        = 'Cut';
    const HANDOFF                    = 'Handoff';
    const ISOLATION                  = 'Isolation';
    const MISC                       = 'Misc';
    const OFF_SCREEN                 = 'OffScreen';
    const PUTBACKS                   = 'OffRebound';
    const PICK_AND_ROLL_BALL_HANDLER = 'PRBallHandler';
    const PICK_AND_ROLL_ROLL_MAN     = 'PRRollman';
    const POST_UP                    = 'Postup';
    const SPOT_UP                    = 'Spotup';
    const TRANSITION                 = 'Transition';

    // NBA website refers to these as putbacks, but send across as offensive rebounds
    const OFFENSIVE_REBOUNDS = self::PUTBACKS;

    const OPTIONS = [
        self::TRANSITION,
        self::ISOLATION,
        self::PICK_AND_ROLL_BALL_HANDLER,
        self::PICK_AND_ROLL_ROLL_MAN,
        self::POST_UP,
        self::SPOT_UP,
        self::HANDOFF,
        self::CUT,
        self::OFF_SCREEN,
        self::PUTBACKS,
        self::MISC,
    ];

    /**
     * {@inheritdoc}
     * @return int
     */
    public static function getDefaultValue(): string
    {
        return self::TRANSITION;
    }
}