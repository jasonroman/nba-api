<?php

namespace JasonRoman\NbaApi\Request\Data;

use JasonRoman\NbaApi\Constraints as ApiAssert;

class FullScheduleRequest extends AbstractDataApiRequest
{
    const ENDPOINT = '/v2015/{format}/mobile_teams/nba/{year}/league/{leagueId}_full_schedule.{format}';

    /**
     * @var string // not sure what leagues, investigate
     * @ApiAssert\ApiChoice(LeagueIdParam::NBA)
     */
    public $format;

    /**
     * @var int
     * @ApiAssert\ApiRegex("/^\d{4}$/")
     * @Assert\Range(min = 2015)
     */
    public $year;

    /**
     * @var string // not sure what leagues, investigate
     * @ApiAssert\ApiChoice(LeagueIdParam::NBA)
     */
    public $leagueId;
}