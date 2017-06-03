<?php

namespace JasonRoman\NbaApi\Types;

class SeasonType
{
    const FORMAT= '/^(Pre Season)|(Regular Season)|(Pre Season)|(Playoffs)|(All-Star)|(All Star)$/';

    const PRE_SEASON     = 'Pre Season';
    const REGULAR_SEASON = 'Regular Season';
    const PLAYOFFS       = 'Playoffs';
    const ALL_STAR       = 'All-Star';
    const ALL_STAR_ALT   = 'All Star';

    /**
     * @var string
     */
    public $value;
}