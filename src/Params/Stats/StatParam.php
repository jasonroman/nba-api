<?php
declare(strict_types = 1);

namespace JasonRoman\NbaApi\Params\Stats;

class StatParam extends AbstractStatsParam
{
    const ASSISTS                = 'AST';
    const BLOCKS                 = 'BLK';
    const FIELD_GOAL_PERCENTAGE  = 'FG_PCT';
    const FREE_THROW_PERCENTAGE  = 'FT_PCT';
    const POINTS                 = 'PTS';
    const REBOUNDS               = 'REB';
    const STEALS                 = 'STL';
    const THREE_POINT_PERCENTAGE = 'FG3_PCT';

    const OPTIONS = [
        self::ASSISTS,
        self::BLOCKS,
        self::FIELD_GOAL_PERCENTAGE,
        self::FREE_THROW_PERCENTAGE,
        self::POINTS,
        self::REBOUNDS,
        self::STEALS,
        self::THREE_POINT_PERCENTAGE,
    ];
}