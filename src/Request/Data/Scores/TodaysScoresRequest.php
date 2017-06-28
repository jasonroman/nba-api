<?php

namespace JasonRoman\NbaApi\Request\Data\Scores;

use Symfony\Component\Validator\Constraints as Assert;
use JasonRoman\NbaApi\Constraints as ApiAssert;
use JasonRoman\NbaApi\Params\LeagueIdParam;
use JasonRoman\NbaApi\Request\Data\AbstractDataApiRequest;

/**
 * Get the scores for today. Makes no sense to put a season year other than current, as it will never have data.
 */
class TodaysScoresRequest extends AbstractDataApiRequest
{
    const ENDPOINT = '/data/v2015/json/mobile_teams/nba/{year}/scores/{leagueId}_todays_scores.json';

    /**
     * @Assert\NotBlank()
     * @Assert\Type("int")
     * @Assert\Range(min = 2015)
     *
     * @var int
     */
    public $year;

    /**
     * @Assert\NotBlank()
     * @Assert\Type("string")
     * @ApiAssert\ApiChoice(LeagueIdParam::OPTIONS_NBA)
     *
     * @var string
     */
    public $leagueId;
}