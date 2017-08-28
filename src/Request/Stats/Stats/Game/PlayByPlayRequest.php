<?php

namespace JasonRoman\NbaApi\Request\Stats\Stats\Game;

use Symfony\Component\Validator\Constraints as Assert;
use JasonRoman\NbaApi\Constraints as ApiAssert;
use JasonRoman\NbaApi\Params\GameIdParam;
use JasonRoman\NbaApi\Params\Stats\StartPeriodParam;
use JasonRoman\NbaApi\Params\Stats\EndPeriodParam;
use JasonRoman\NbaApi\Request\AbstractStatsRequest;

class PlayByPlayRequest extends AbstractStatsRequest
{
    const ENDPOINT = '/stats/playbyplayv2';

    /**
     * @Assert\NotBlank()
     * @Assert\Type("string")
     * @ApiAssert\ApiRegex(GameIdParam::FORMAT)
     *
     * @var string
     */
    public $gameId;

    /**
     * @Assert\NotBlank()
     * @Assert\Type("int")
     * @Assert\Range(min = StartPeriodParam::MIN, max = StartPeriodParam::MAX)
     *
     * @var string
     */
    public $startPeriod;

    /**
     * @Assert\NotBlank()
     * @Assert\Type("int")
     * @Assert\Range(min = EndPeriodParam::MIN, max = EndPeriodParam::MAX)
     *
     * @var string
     */
    public $endPeriod;
}