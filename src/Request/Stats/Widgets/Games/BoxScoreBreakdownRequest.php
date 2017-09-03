<?php

namespace JasonRoman\NbaApi\Request\Stats\Widgets\Games;

use Symfony\Component\Validator\Constraints as Assert;
use JasonRoman\NbaApi\Request\Stats\Widgets\AbstractStatsWidgetsRequest;

/**
 * Get the box score breakdown of all games scheduled for a given day. No scores; just the teams, times, and summary.
 */
class BoxScoreBreakdownRequest extends AbstractStatsWidgetsRequest
{
    const ENDPOINT = '/js/data/widgets/boxscore_breakdown_{gameDateYmd}.json';

    /**
     * @Assert\NotBlank()
     * @Assert\Type("\DateTime")
     *
     * @var \DateTime
     */
    public $gameDateYmd;

    /**
     * {@inheritdoc}
     */
    public function getExampleValues(): array
    {
        return [
            'gameDateYmd' => new \DateTime('2017-01-01'),
        ];
    }
}