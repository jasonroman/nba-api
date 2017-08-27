<?php

namespace JasonRoman\NbaApi\Request\Stats\Stats\Game;

use Symfony\Component\Validator\Constraints as Assert;
use JasonRoman\NbaApi\Constraints as ApiAssert;
use JasonRoman\NbaApi\Params\GameIdParam;
use JasonRoman\NbaApi\Request\AbstractStatsRequest;

class BoxScorePlayerTrackingRequest extends AbstractStatsRequest
{
    const ENDPOINT = '/stats/boxscoreplayertrackv2';

    /**
     * @Assert\NotBlank()
     * @Assert\Type("string")
     * @ApiAssert\ApiRegex(pattern = GameIdParam::FORMAT)
     *
     * @var string
     */
    public $gameId;
}