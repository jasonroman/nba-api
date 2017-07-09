<?php

namespace JasonRoman\NbaApi\Request\Stats\Video;

use Symfony\Component\Validator\Constraints as Assert;
use JasonRoman\NbaApi\Constraints as ApiAssert;
use JasonRoman\NbaApi\Params\LeagueIdParam;
use JasonRoman\NbaApi\Request\AbstractStatsRequest;

class VideoStatusRequest extends AbstractStatsRequest
{
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
     * @Assert\Date()
     *
     * @var \DateTime|string if string, format is YYYY-MM-DD
     */
    public $gameDate;
}