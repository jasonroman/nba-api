<?php

namespace JasonRoman\NbaApi\Types;

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