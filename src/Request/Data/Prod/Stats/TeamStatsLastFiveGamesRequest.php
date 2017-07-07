<?php

namespace JasonRoman\NbaApi\Request\Data\Prod\Stats;

use Symfony\Component\Validator\Constraints as Assert;
use JasonRoman\NbaApi\Request\AbstractDataRequest;

/**
 * Get stats for each team for their last 5 games. Appears to only work for 2015.
 */
class TeamStatsLastFiveGamesRequest extends AbstractDataRequest
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