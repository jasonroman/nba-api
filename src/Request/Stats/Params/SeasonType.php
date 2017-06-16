<?php

namespace JasonRoman\NbaApi\Request\Stats\Params;

class SeasonType
{
    const FORMAT                    = '/^(Pre Season)|(Regular Season)|(Playoffs)$/';
    const FORMAT_WITH_ALL_STAR      = '/^(Pre Season)|(Regular Season)|(Playoffs)|(All Star)$/';
    const FORMAT_WITH_BOTH_ALL_STAR = '/^(Pre Season)|(Regular Season)|(Playoffs)|(All-Star)|(All Star)$/';

    const ALL_STAR       = 'All Star';
    const ALL_STAR_ALT   = 'All-Star';
    const PRE_SEASON     = 'Pre Season';
    const REGULAR_SEASON = 'Regular Season';
    const PLAYOFFS       = 'Playoffs';

    const SEASON_TYPES = [
        self::PRE_SEASON,
        self::REGULAR_SEASON,
        self::PLAYOFFS,
    ];

    /**
     * @var string
     */
    public $value;
}