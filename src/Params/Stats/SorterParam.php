<?php declare(strict_types = 1);

namespace JasonRoman\NbaApi\Params\Stats;

class SorterParam extends AbstractStatsParam
{
    const FIELD_GOALS_ATTEMPTED    = 'FGA';
    const FIELD_GOALS_MADE         = 'FGM';
    const FIELD_GOAL_PERCENTAGE    = 'FG_PCT';
    const FREE_THROWS_ATTEMPTED    = 'FTA';
    const FREE_THROWS_MADE         = 'FTM';
    const FREE_THROW_PERCENTAGE    = 'FT_PCT';
    const THREE_POINTERS_ATTEMPTED = 'FG3A';
    const THREE_POINTERS_MADE      = 'FG3M';
    const THREE_POINT_PERCENTAGE   = 'FG3_PCT';
    const DEFENSIVE_REBOUNDS       = 'DREB';
    const OFFENSIVE_REBOUNDS       = 'OREB';
    const REBOUNDS                 = 'REB';
    const ASSISTS                  = 'AST';
    const STEALS                   = 'STL';
    const BLOCKS                   = 'BLK';
    const TURNOVERS                = 'TOV';
    const POINTS                   = 'PTS';
    const DATE                     = 'DATE';

    const OPTIONS = [
        self::FIELD_GOALS_ATTEMPTED,
        self::FIELD_GOALS_ATTEMPTED,
        self::FIELD_GOAL_PERCENTAGE,
        self::FREE_THROWS_ATTEMPTED,
        self::FREE_THROWS_MADE,
        self::FREE_THROW_PERCENTAGE,
        self::THREE_POINTERS_ATTEMPTED,
        self::THREE_POINTERS_MADE,
        self::THREE_POINT_PERCENTAGE,
        self::DEFENSIVE_REBOUNDS,
        self::OFFENSIVE_REBOUNDS,
        self::REBOUNDS,
        self::ASSISTS,
        self::STEALS,
        self::BLOCKS,
        self::TURNOVERS,
        self::POINTS,
        self::DATE,
    ];
}