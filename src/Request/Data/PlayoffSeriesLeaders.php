<?php

namespace JasonRoman\NbaApi\Request\Data;

class PlayoffSeriesLeaders extends AbstractDataApiRequest
{
    const ENDPOINT = '/data/10s/prod/v1/{year}/playoffs_{seriesId}_leaders.json';

    /**
     * @var int
     * @ApiAssert\ApiRegex(YearParam::FORMAT)
     * @Assert\Range(min = 2016)
     */
    public $year;


}