<?php

namespace JasonRoman\NbaApi\Request\Data;

class FullScheduleRequest extends AbstractDataApiRequest
{
    const ENDPOINT = '/v2015/{format}/mobile_teams/nba/{year}/league/{leagueId}_full_schedule.{format}';

    /**
     * @var string // not sure what leagues, investigate
     * @Assert\Choice(LeagueIdParam::NBA)
     */
    public $format;

    /**
     * @var int
     * @Assert\Regex("/^\d{4}$/")
     */
    public $year;

    /**
     * @var string // not sure what leagues, investigate
     * @Assert\Choice(LeagueIdParam::NBA)
     */
    public $leagueId;
}