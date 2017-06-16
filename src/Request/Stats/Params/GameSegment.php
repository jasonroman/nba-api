<?php

namespace JasonRoman\NbaApi\Request\Stats\Params;

class GameSegment
{
    const FORMAT = '/^((First Half)|(Overtime)|(Second Half))?$/';

    const FIRST_HALF  = 'First Half';
    const OVERTIME    = 'Overtime';
    const SECOND_HALF = 'Second Half';

    /**
     * @var string
     */
    public $value;
}