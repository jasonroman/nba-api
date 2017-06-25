<?php

namespace JasonRoman\NbaApi\Request\Data;

use Symfony\Component\Validator\Constraints as Assert;
use JasonRoman\NbaApi\Constraints as ApiAssert;
use JasonRoman\NbaApi\Request\Data\Params\YearParam;

class LeagueLastFiveGameTeamStatsRequest extends AbstractDataApiRequest
{
    const ENDPOINT = '/data/10s/prod/v1/{year}/team_stats_last_five_games.json';

    /**
     * @var int
     * @ApiAssert\ApiRegex(YearParam::FORMAT)
     * @Assert\Range(min = 2015)
     */
    public $year;
}