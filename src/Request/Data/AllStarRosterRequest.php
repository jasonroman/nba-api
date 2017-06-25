<?php

namespace JasonRoman\NbaApi\Request\Data;

use Symfony\Component\Validator\Constraints as Assert;
use JasonRoman\NbaApi\Constraints as ApiAssert;
use JasonRoman\NbaApi\Request\Data\Params\YearParam;

class AllStarRosterRequest extends AbstractDataApiRequest
{
    const ENDPOINT = '/data/10s/prod/v1/allstar/{year}/AS_roster.json';

    /**
     * @var int
     * @ApiAssert\ApiRegex(YearParam::FORMAT)
     * @Assert\Range(min = 2016)
     */
    public $year;
}