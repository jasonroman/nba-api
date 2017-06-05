<?php

namespace JasonRoman\NbaApi\Types;

class Stat
{
    const FORMAT = '/^(PTS)|(REB)|(AST)|(FG_PCT)|(FT_PCT)|(FG3_PCT)|(STL)|(BLK)$/';

    const ASSISTS                = 'AST';
    const BLOCKS                 = 'BLK';
    const FIELD_GOAL_PERCENTAGE  = 'FG_PCT';
    const FREE_THROW_PERCENTAGE  = 'FT_PCT';
    const POINTS                 = 'PTS';
    const REBOUNDS               = 'REB';
    const STEALS                 = 'STL';
    const THREE_POINT_PERCENTAGE = 'FG3_PCT';

    /**
     * @var string
     */
    public $value;
}