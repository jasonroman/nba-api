<?php

namespace JasonRoman\NbaApi\Request\Data;

class PlayoffsBracketRequest extends AbstractDataApiRequest
{
    const ENDPOINT = '/data/10s/prod/v1/{year}/playoffsBracket.json';

    /**
     * @var int
     * @ApiAssert\ApiRegex(YearParam::FORMAT)
     * @Assert\Range(min = 2016)
     */
    public $year;
}