<?php

namespace JasonRoman\NbaApi\Types;

class ShotClockRange
{
    const FORMAT =
        '/('.
        '(24-22)|(22-18 Very Early)|(18-15 Early)|(15-7 Average)|(7-4 Late)|(4-0 Very Late)|(ShotClock Off)'.
        ')?/';

    const EARLIEST   = '24-22';
    const VERY_EARLY = '22-18 Very Early';
    const EARLY      = '18-15 Early';
    const AVERAGE    = '15-7 Average';
    const LATE       = '7-4 Late';
    const VERY_LATE  = '4-0 Very Late';
    const OFF        = 'ShotClock Off';

    /**
     * @var string
     */
    public $value;
}