<?php

namespace JasonRoman\NbaApi\Request\Data;

use Symfony\Component\Validator\Constraints as Assert;
use JasonRoman\NbaApi\Constraints as ApiAssert;
use JasonRoman\NbaApi\Request\Data\Params\FormatParam;
use JasonRoman\NbaApi\Request\Params\GameIdParam;
use JasonRoman\NbaApi\Request\Params\YearParam;

class PbpRequest extends AbstractDataApiRequest
{
    const ENDPOINT = '/data/10s/prod/v1/{date}/{gameId}_pbp_{period}.json';

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

    /**
     * @Assert\Range(min = 1)
     * @var string
     */
    public $period;
}