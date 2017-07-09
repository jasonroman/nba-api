<?php

namespace JasonRoman\NbaApi\Request\Stats\Stats\Playoffs;

use Symfony\Component\Validator\Constraints as Assert;
use JasonRoman\NbaApi\Constraints as ApiAssert;
use JasonRoman\NbaApi\Params\LeagueIdParam;
use JasonRoman\NbaApi\Params\SeasonParam;
use JasonRoman\NbaApi\Params\Stats\PlayoffSeriesIdParam;
use JasonRoman\NbaApi\Request\AbstractStatsRequest;

class PlayoffSeriesRequest extends AbstractStatsRequest
{
    const ENDPOINT = '/stats/commonplayoffseries';

    /**
     * @Assert\NotBlank()
     * @Assert\Type("string")
     * @ApiAssert\ApiChoice(LeagueIdParam::OPTIONS_NBA_G_LEAGUE)
     *
     * @var string
     */
    public $leagueId;

    /**
     * @Assert\NotBlank()
     * @Assert\Type("string")
     * @ApiAssert\ApiRegex(pattern = SeasonParam::FORMAT)
     *
     * @var string
     */
    public $season;

    /**
     * @Assert\Type("string")
     * @ApiAssert\ApiRegex(pattern = PlayoffSeriesIdParam::FORMAT)
     *
     * @var string
     */
    public $seriesId;
}