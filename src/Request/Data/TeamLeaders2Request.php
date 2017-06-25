<?php

namespace JasonRoman\NbaApi\Request\Data;

use Symfony\Component\Validator\Constraints as Assert;
use JasonRoman\NbaApi\Constraints as ApiAssert;
use JasonRoman\NbaApi\Request\Data\Params\YearParam;

class TeamLeaders2Request extends AbstractDataApiRequest
{
    const ENDPOINT = '/data/10s/prod/v1/{year}/teams/{teamId}/leaders.json';

    /**
     * @var int
     * @ApiAssert\ApiRegex(YearParam::FORMAT)
     * @Assert\Range(min = 2016)
     */
    public $year;

    /**
     * @var int
     */
    public $teamId;
}