<?php

namespace JasonRoman\NbaApi\Request\Data\Teams;

use Symfony\Component\Validator\Constraints as Assert;
use JasonRoman\NbaApi\Constraints as ApiAssert;
use JasonRoman\NbaApi\Request\Params\YearParam;

class TeamsRequest extends AbstractDataApiRequest
{
    const ENDPOINT = '/data/10s/prod/v1/{year}/teams.json';

    /**
     * @Assert\NotBlank()
     * @Assert\Type("int")
     * @Assert\Range(min = 2012)
     * @ApiAssert\ApiRegex(YearParam::FORMAT)
     *
     * @var int
     */
    public $year;
}