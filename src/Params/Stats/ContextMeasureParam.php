<?php declare(strict_types = 1);

namespace JasonRoman\NbaApi\Params\Stats;

class ContextMeasureParam extends AbstractStatsParam
{
    const EFFECTIVE_FIELD_GOAL_PERCENTAGE = 'EFG_PCT';
    const FIELD_GOALS_MADE                = 'FGM';
    const FIELD_GOALS_ATTEMPTED           = 'FGA';
    const FIELD_GOAL_PERCENTAGE           = 'FG_PCT';
    const PERSONAL_FOULS                  = 'PF';
    const POINTS                          = 'PTS';
    const POINTS_FAST_BREAK               = 'PTS_FB';
    const POINTS_OFF_TURNOVERS            = 'PTS_OFF_TOV';
    const POINTS_SECOND_CHANCE            = 'PTS_2ND_CHANCE';
    const THREE_POINTERS_MADE             = 'FG3M';
    const THREE_POINTERS_ATTEMPTED        = 'FG3A';
    const THREE_POINT_PERCENTAGE          = 'FG3_PCT';
    const TRUE_SHOOTING_PERCENTAGE        = 'TS_PCT';

    const OPTIONS = [
        self::EFFECTIVE_FIELD_GOAL_PERCENTAGE,
        self::FIELD_GOALS_MADE,
        self::FIELD_GOALS_ATTEMPTED,
        self::FIELD_GOAL_PERCENTAGE,
        self::PERSONAL_FOULS,
        self::POINTS,
        self::POINTS_FAST_BREAK,
        self::POINTS_OFF_TURNOVERS,
        self::POINTS_SECOND_CHANCE,
        self::THREE_POINTERS_MADE,
        self::THREE_POINTERS_ATTEMPTED,
        self::THREE_POINT_PERCENTAGE,
        self::TRUE_SHOOTING_PERCENTAGE,
    ];
}