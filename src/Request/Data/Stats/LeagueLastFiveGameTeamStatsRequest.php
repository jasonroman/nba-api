<?php

namespace JasonRoman\NbaApi\Request\Data\Stats;

use Symfony\Component\Validator\Constraints as Assert;
use JasonRoman\NbaApi\Request\Data\AbstractDataApiRequest;

/**
 * Get stats for each team for their last 5 games. Appears to only work for 2015.
 */
class LeagueLastFiveGameTeamStatsRequest extends AbstractDataApiRequest
{
    const ENDPOINT = '/data/prod/v1/{year}/team_stats_last_five_games.json';

    /**
     * @Assert\NotBlank()
     * @Assert\Type("int")
     * @Assert\Range(min = 2015, max = 2015)
     *
     * @var int
     */
    public $year;
}