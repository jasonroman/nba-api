<?php

namespace JasonRoman\NbaApi\Request\Stats\Stats\Player;

use Symfony\Component\Validator\Constraints as Assert;
use JasonRoman\NbaApi\Constraints as ApiAssert;
use JasonRoman\NbaApi\Params\LeagueIdParam;
use JasonRoman\NbaApi\Params\SeasonIdParam;
use JasonRoman\NbaApi\Params\TeamIdParam;
use JasonRoman\NbaApi\Request\AbstractStatsRequest;

class TeamHistoricalLeadersRequest extends AbstractStatsRequest
{
    const ENDPOINT = '/stats/teamhistoricalleaders';

    /**
     * @Assert\NotBlank()
     * @Assert\Type("string")
     * @ApiAssert\ApiRegex(pattern = LeagueIdParam::FORMAT)
     *
     * @var string
     */
    public $leagueId;

    /**
     * @Assert\NotBlank()
     * @Assert\Type("string")
     * @ApiAssert\ApiRegex(pattern = SeasonIdParam::FORMAT)
     *
     * @var string
     */
    public $seasonId;

    /**
     * @Assert\NotBlank()
     * @Assert\Type("int")
     * @Assert\Range(min = TeamIdParam::MIN_ALL, TeamIdParam::MAX)
     *
     * @var int
     */
    public $teamId;
}