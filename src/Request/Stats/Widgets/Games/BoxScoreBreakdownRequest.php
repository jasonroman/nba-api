<?php

namespace JasonRoman\NbaApi\Request\Stats\Widgets\Games;

use Symfony\Component\Validator\Constraints as Assert;
use JasonRoman\NbaApi\Request\AbstractStatsRequest;

/**
 * Get the box score breakdown of all games scheduled for a given day. No scores; just the teams, times, and summary.
 */
class BoxScoreBreakdownRequest extends AbstractStatsRequest
{
    const ENDPOINT = '/js/data/widgets/boxscore_breakdown_{gameDateYmd}.json';

    /**
     * @Assert\NotBlank()
     * @Assert\Date()
     *
     * @var \DateTime|string if string, format is YYYY-MM-DD
     */
    public $gameDateYmd;
}