<?php

namespace JasonRoman\NbaApi\Request\Data;

use Symfony\Component\Validator\Constraints as Assert;
use JasonRoman\NbaApi\Constraints as ApiAssert;
use JasonRoman\NbaApi\Request\Data\Params\FormatParam;
use JasonRoman\NbaApi\Request\Params\GameIdParam;
use JasonRoman\NbaApi\Request\Params\YearParam;

class PlayerProfileRequest extends AbstractDataApiRequest
{
    const ENDPOINT = '/data/10s/prod/v1/{year}/players/{personId}_profile.json';

    /**
     * @ApiAssert\ApiRegex(pattern = YearParam::FORMAT)
     * @Assert\Range(min = 2015, minMessage = "Minimum year is {{ limit }}")
     * @var int
     */
    public $year;

    /**
     * @var int
     * @Assert\Range(min = 1)
     */
    public $personId;
}