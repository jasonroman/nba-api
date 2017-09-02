<?php declare(strict_types = 1);

namespace JasonRoman\NbaApi\Params\Stats;

class StatCategoryParam extends AbstractStatsParam
{
    const ASSISTS           = 'Assists';
    const CLUTCH            = 'Clutch';
    const DEFENSE           = 'Defense';
    const FAST_BREAK        = 'Fast Break';
    const EFFICIENCY        = 'Efficiency';
    const PLAYMAKING        = 'Playmaking';
    const POINTS            = 'Points';
    const REBOUNDS          = 'Rebounds';
    const SCORING_BREAKDOWN = 'Scoring Breakdown';

    const ABBR_MINUTES                  = 'MIN';
    const ABBR_FIELD_GOALS_ATTEMPTED    = 'FGA';
    const ABBR_FIELD_GOALS_MADE         = 'FGM';
    const ABBR_FIELD_GOAL_PERCENTAGE    = 'FG%';
    const ABBR_THREE_POINTERS_ATTEMPTED = '3PA';
    const ABBR_THREE_POINTERS_MADE      = '3PM';
    const ABBR_THREE_POINT_PERCENTAGE   = '3P%';
    const ABBR_FREE_THROWS_ATTEMPTED    = 'FTA';
    const ABBR_FREE_THROWS_MADE         = 'FTM';
    const ABBR_FREE_THROW_PERCENTAGE    = 'FT%';
    const ABBR_OFFENSIVE_REBOUNDS       = 'OREB';
    const ABBR_DEFENSIVE_REBOUNDS       = 'DREB';
    const ABBR_REBOUNDS                 = 'REB';
    const ABBR_ASSISTS                  = 'AST';
    const ABBR_STEALS                   = 'STL';
    const ABBR_BLOCKS                   = 'BLK';
    const ABBR_TURNOVERS                = 'TOV';
    const ABBR_POINTS                   = 'PTS';

    const OPTIONS = [
        self::ASSISTS,
        self::CLUTCH,
        self::DEFENSE,
        self::FAST_BREAK,
        self::EFFICIENCY,
        self::PLAYMAKING,
        self::POINTS,
        self::REBOUNDS,
        self::SCORING_BREAKDOWN,
    ];

    const OPTIONS_ABBR = [
        self::ABBR_MINUTES,
        self::ABBR_FIELD_GOALS_ATTEMPTED,
        self::ABBR_FIELD_GOALS_MADE,
        self::ABBR_FIELD_GOAL_PERCENTAGE,
        self::ABBR_THREE_POINTERS_ATTEMPTED,
        self::ABBR_THREE_POINTERS_MADE,
        self::ABBR_THREE_POINT_PERCENTAGE,
        self::ABBR_FREE_THROWS_ATTEMPTED,
        self::ABBR_FREE_THROWS_MADE,
        self::ABBR_FREE_THROW_PERCENTAGE,
        self::ABBR_OFFENSIVE_REBOUNDS,
        self::ABBR_DEFENSIVE_REBOUNDS,
        self::ABBR_REBOUNDS,
        self::ABBR_ASSISTS,
        self::ABBR_STEALS,
        self::ABBR_BLOCKS,
        self::ABBR_TURNOVERS,
        self::ABBR_POINTS,
    ];
}