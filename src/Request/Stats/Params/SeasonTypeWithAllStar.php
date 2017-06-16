<?php

namespace JasonRoman\NbaApi\Request\Stats\Params;

class SeasonTypeWithAllStar extends SeasonType
{
    const FORMAT = '/^(Pre Season)|(Regular Season)|(Playoffs)|(All Star)$/';

    const SEASON_TYPES = [
        self::PRE_SEASON,
        self::REGULAR_SEASON,
        self::PLAYOFFS,
        self::ALL_STAR,
    ];

    /**
     * @var string
     */
    public $value;
}