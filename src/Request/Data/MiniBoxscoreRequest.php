<?php

namespace JasonRoman\NbaApi\Request\Data;

use JasonRoman\NbaApi\Constraints as ApiAssert;
use JasonRoman\NbaApi\Request\Data\Params\DateParam;
use JasonRoman\NbaApi\Request\Params\GameIdParam;

class MiniBoxscoreRequest extends AbstractDataApiRequest
{
    const ENDPOINT = '/data/10s/prod/v1/{date}/{gameId}_mini_boxscore.json';

    /**
     * @var string
     * @ApiAssert\ApiRegex(pattern = DateParam::FORMAT)
     */
    public $date;

    /**
     * @ApiAssert\ApiRegex(pattern = GameIdParam::FORMAT)
     * @var string
     */
    public $gameId;
}