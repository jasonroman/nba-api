<?php

namespace JasonRoman\NbaApi\Request\Stats\Stats\Team;

use Symfony\Component\Validator\Constraints as Assert;
use JasonRoman\NbaApi\Constraints as ApiAssert;
use JasonRoman\NbaApi\Params\LeagueIdParam;
use JasonRoman\NbaApi\Params\TeamIdParam;
use JasonRoman\NbaApi\Request\AbstractStatsRequest;

class TeamFranchiseLeadersRequest extends AbstractStatsRequest
{
    const ENDPOINT = '/stats/franchiseleaders';

    /**
     * @Assert\NotBlank()
     * @Assert\Type("string")
     * @ApiAssert\ApiChoice(LeagueIdParam::OPTIONS_NBA_WNBA_G_LEAGUE)
     *
     * @var string
     */
    public $leagueId;

    /**
     * @Assert\NotBlank()
     * @Assert\Type("int")
     * @Assert\Range(min = TeamIdParam::MIN, max = TeamIdParam::MAX)
     *
     * @var int
     */
    public $teamId;
}