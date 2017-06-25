<?php

namespace JasonRoman\NbaApi\Request\Data;

use JasonRoman\NbaApi\Constraints as ApiAssert;
use JasonRoman\NbaApi\Request\Params\DateParam;

class ScoreboardRequest extends AbstractDataApiRequest
{
    const ENDPOINT = '/data/10s/prod/v1/{date}/scoreboard.json';

    /**
     * @var string
     * @ApiAssert\ApiRegex(pattern = DateParam::FORMAT)
     */
    public $date;
}