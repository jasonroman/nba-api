<?php

namespace JasonRoman\NbaApi\Request\Stats\Stats\Teams;

use Symfony\Component\Validator\Constraints as Assert;
use JasonRoman\NbaApi\Constraints as ApiAssert;
use JasonRoman\NbaApi\Params\LeagueIdParam;
use JasonRoman\NbaApi\Request\AbstractStatsRequest;

class TeamYearsRequest extends AbstractStatsRequest
{
    const ENDPOINT = '/stats/commonteamyears';

    /**
     * @Assert\NotBlank()
     * @Assert\Type("string")
     * @ApiAssert\ApiRegex(pattern = LeagueIdParam::FORMAT)
     *
     * @var string
     */
    public $leagueId;
}