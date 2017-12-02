<?php

namespace JasonRoman\NbaApi\Request\Stats\Stats\Standings;

use JasonRoman\NbaApi\Constraints as ApiAssert;
use JasonRoman\NbaApi\Params\LeagueIdParam;
use JasonRoman\NbaApi\Params\SeasonParam;
use JasonRoman\NbaApi\Params\Stats\SeasonTypeParam;
use JasonRoman\NbaApi\Request\Stats\Stats\AbstractStatsStatsRequest;
use Symfony\Component\Validator\Constraints as Assert;

class LeagueStandingsRequest extends AbstractStatsStatsRequest
{
    const ENDPOINT = '/stats/leaguestandingsv3';

    /**
     * @Assert\NotBlank()
     * @Assert\Type("string")
     * @ApiAssert\ApiChoice(LeagueIdParam::OPTIONS_NBA_WNBA_SUMMER_G_LEAGUE)
     *
     * @var string
     */
    public $leagueId;

    /**
     * @Assert\NotBlank()
     * @Assert\Type("string")
     * @ApiAssert\ApiRegex(SeasonParam::FORMAT)
     *
     * @var string
     */
    public $season;

    /**
     * @Assert\Type("string")
     * @ApiAssert\ApiChoice(SeasonTypeParam::OPTIONS_PRE_SEASON_REGULAR_SEASON)
     *
     * @var string
     */
    public $seasonType;
}