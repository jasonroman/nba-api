<?php

namespace JasonRoman\NbaApi\Request\Stats\Params;

class Conference
{
    const FORMAT = '/((East)|(West))?/';

    const EAST = 'East';
    const WEST = 'West';

    /**
     * @var string
     */
    public $value;
}