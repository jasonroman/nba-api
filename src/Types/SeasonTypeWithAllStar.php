<?php

namespace JasonRoman\NbaApi\Types;

class SeasonTypeWithAllStar
{
    const FORMAT = '/^(Pre Season)|(Regular Season)|(Pre Season)|(Playoffs)|(All Star)$/';

    const ALL_STAR       = 'All Star';
    const PRE_SEASON     = 'Pre Season';
    const REGULAR_SEASON = 'Regular Season';
    const PLAYOFFS       = 'Playoffs';

    /**
     * @var string
     */
    public $value;
}