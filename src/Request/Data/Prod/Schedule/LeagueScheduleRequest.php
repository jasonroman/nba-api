<?php

namespace JasonRoman\NbaApi\Request\Data\Prod\Schedule;

use JasonRoman\NbaApi\Request\AbstractDataRequest;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Get the league schedule for a given year.
 */
class LeagueScheduleRequest extends AbstractDataRequest
{
    const ENDPOINT = '/data/prod/v1/{year}/schedule.json';

    /**
     * @Assert\NotBlank()
     * @Assert\Type("int")
     * @Assert\Range(min = 2015)
     *
     * @var int
     */
    public $year;
}