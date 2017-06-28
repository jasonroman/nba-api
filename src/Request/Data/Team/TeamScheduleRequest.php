<?php

namespace JasonRoman\NbaApi\Request\Data\Team;

use Symfony\Component\Validator\Constraints as Assert;
use JasonRoman\NbaApi\Constraints as ApiAssert;
use JasonRoman\NbaApi\Request\Data\AbstractDataApiRequest;
use JasonRoman\NbaApi\Params\Data\TeamUrlCodeParam;

/**
 * Get the schedule of a team for a given season. Available from 2015. Includes scores if the game has been played.
 */
class TeamScheduleRequest extends AbstractDataApiRequest
{
    const ENDPOINT = '/data/prod/v1/{year}/teams/{teamUrlCode}/schedule.json';

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
     * @ApiAssert\ApiChoice(TeamUrlCodeParam::OPTIONS)
     *
     * @var string
     */
    public $teamUrlCode;
}