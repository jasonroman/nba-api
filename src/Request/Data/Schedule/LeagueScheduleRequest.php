<?php

namespace JasonRoman\NbaApi\Request\Data\Schedule;

use JasonRoman\NbaApi\Request\Data\AbstractDataApiRequest;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Get the league schedule for a given year.
 */
class LeagueScheduleRequest extends AbstractDataApiRequest
{
    const ENDPOINT = '/data/10s/prod/v1/{year}/schedule.json';

    /**
     * @Assert\NotBlank()
     * @Assert\Type("int")
     * @Assert\Range(min = 2015)
     *
     * @var int
     */
    public $year;
}