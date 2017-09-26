<?php

namespace JasonRoman\NbaApi\Request\Stats\Stats\Game;

use JasonRoman\NbaApi\Constraints as ApiAssert;
use JasonRoman\NbaApi\Params\GameIdParam;
use JasonRoman\NbaApi\Params\Stats\EndPeriodParam;
use JasonRoman\NbaApi\Params\Stats\EndRangeParam;
use JasonRoman\NbaApi\Params\Stats\RangeTypeParam;
use JasonRoman\NbaApi\Params\Stats\StartPeriodParam;
use JasonRoman\NbaApi\Params\Stats\StartRangeParam;
use JasonRoman\NbaApi\Request\Stats\Stats\AbstractStatsStatsRequest;
use Symfony\Component\Validator\Constraints as Assert;

class BoxScoreSummaryRequest extends AbstractStatsStatsRequest
{
    const ENDPOINT = '/stats/boxscoresummaryv2';

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

    /**
     * @Assert\NotBlank()
     * @Assert\Type("int")
     * @Assert\Range(min = StartRangeParam::MIN, max = StartRangeParam::MAX)
     *
     * @var string
     */
    public $startRange;

    /**
     * @Assert\NotBlank()
     * @Assert\Type("int")
     * @Assert\Range(min = EndRangeParam::MIN, max = EndRangeParam::MAX)
     *
     * @var string
     */
    public $endRange;

    /**
     * @Assert\NotBlank()
     * @Assert\Type("int")
     * @Assert\Range(min = RangeTypeParam::MIN, max = RangeTypeParam::MAX)
     *
     * @var string
     */
    public $rangeType;
}