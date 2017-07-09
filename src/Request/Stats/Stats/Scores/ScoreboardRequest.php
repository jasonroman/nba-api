<?php

namespace JasonRoman\NbaApi\Request\Stats\Stats\Scoreboard;

use Symfony\Component\Validator\Constraints as Assert;
use JasonRoman\NbaApi\Constraints as ApiAssert;
use JasonRoman\NbaApi\Params\LeagueIdParam;
use JasonRoman\NbaApi\Request\AbstractStatsRequest;

/**
 * Get the scoreboard for the day. This seems to require header 'Referer: http://stats.nba.com/scores/'
 * and works with cURL, but not with REST clients or on the web itself; cannot figure why.
 *
 * The dayOffset param is odd; it takes the date you specify and adds that number of days to change the date.
 * This can also be negative to go backward for a number of days. Better off just leaving it as 0.
 */
class ScoreboardRequest extends AbstractStatsRequest
{
    const ENDPOINT = '/stats/scoreboardv2';

    /**
     * @Assert\NotBlank()
     * @Assert\Type("string")
     * @ApiAssert\ApiRegex(pattern = LeagueIdParam::FORMAT)
     *
     * @var string
     */
    public $leagueId;

    /**
     * @Assert\NotBlank()
     * @Assert\Date()
     *
     * @var \DateTime|string if string, format is YYYY-MM-DD
     */
    public $gameDate;

    /**
     * @Assert\NotBlank()
     * @Assert\Type("int")
     *
     * @var int
     */
    public $dayOffset;

    /**
     * {@inheritdoc}
     */
    public function getDefaultValues(): array
    {
        return [
            'dayOffset' => 0,
        ];
    }
}