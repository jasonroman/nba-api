<?php

namespace JasonRoman\NbaApi\Types;

class GameScope
{
    const FORMAT ='/^(Season)|(Last 10)|(Yesterday)|(Finals)$/';

    const FINALS    = 'Finals';
    const LAST_10   = 'Last 10';
    const SEASON    = 'Season';
    const YESTERDAY = 'Yesterday';

    /**
     * @var string
     */
    public $value;
}