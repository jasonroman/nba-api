<?php

namespace JasonRoman\NbaApi\Request\Stats\Stats\Playoffs;

use JasonRoman\NbaApi\Constraints as ApiAssert;
use JasonRoman\NbaApi\Params\LeagueIdParam;
use JasonRoman\NbaApi\Params\SeasonIdParam;
use JasonRoman\NbaApi\Request\Stats\Stats\AbstractStatsStatsRequest;
use Symfony\Component\Validator\Constraints as Assert;

class PlayoffPictureRequest extends AbstractStatsStatsRequest
{
    const ENDPOINT = '/stats/playoffpicture';

    /**
     * @Assert\NotBlank()
     * @Assert\Type("string")
     * @ApiAssert\ApiRegex(LeagueIdParam::FORMAT)
     *
     * @var string
     */
    public $leagueId;

    /**
     * @Assert\NotBlank()
     * @Assert\Type("int")
     * @ApiAssert\ApiRegex(SeasonIdParam::FORMAT)
     *
     * @var int
     */
    public $seasonId;
}