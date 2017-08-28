<?php

namespace JasonRoman\NbaApi\Request\Stats\Stats\Teams;

use Symfony\Component\Validator\Constraints as Assert;
use JasonRoman\NbaApi\Constraints as ApiAssert;
use JasonRoman\NbaApi\Params\LeagueIdParam;
use JasonRoman\NbaApi\Request\AbstractStatsRequest;

class FranchiseHistoryRequest extends AbstractStatsRequest
{
    const ENDPOINT = '/stats/franchisehistory';

    /**
     * @Assert\NotBlank()
     * @Assert\Type("string")
     * @ApiAssert\ApiRegex(LeagueIdParam::FORMAT)
     *
     * @var string
     */
    public $leagueId;
}