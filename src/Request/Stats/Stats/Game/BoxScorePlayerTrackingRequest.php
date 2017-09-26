<?php

namespace JasonRoman\NbaApi\Request\Stats\Stats\Game;

use JasonRoman\NbaApi\Constraints as ApiAssert;
use JasonRoman\NbaApi\Params\GameIdParam;
use JasonRoman\NbaApi\Request\Stats\Stats\AbstractStatsStatsRequest;
use Symfony\Component\Validator\Constraints as Assert;

class BoxScorePlayerTrackingRequest extends AbstractStatsStatsRequest
{
    const ENDPOINT = '/stats/boxscoreplayertrackv2';

    /**
     * @Assert\NotBlank()
     * @Assert\Type("string")
     * @ApiAssert\ApiRegex(GameIdParam::FORMAT)
     *
     * @var string
     */
    public $gameId;
}