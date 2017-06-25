<?php

namespace JasonRoman\NbaApi\Request\Data;

use JasonRoman\NbaApi\Constraints as ApiAssert;
use JasonRoman\NbaApi\Request\Data\Params\DateParam;
use JasonRoman\NbaApi\Request\Params\GameIdParam;

/**
 * This seems to be available some time after the game ends.
 */
class GameBookPdfRequest extends AbstractDataApiRequest
{
    const ENDPOINT = '/data/10s/prod/v1/{date}/{gameId}_Book.pdf';

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