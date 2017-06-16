<?php

namespace JasonRoman\NbaApi\Request\Stats\Params;

class SeasonTypeWithBothAllStar
{
    const FORMAT = '/^(Pre Season)|(Regular Season)|(Playoffs)|(All-Star)|(All Star)$/';

    const SEASON_TYPES = [
        self::PRE_SEASON,
        self::REGULAR_SEASON,
        self::PLAYOFFS,
        self::ALL_STAR,
        self::ALL_STAR_ALT,
    ];

    /**
     * @var string
     */
    public $value;
}