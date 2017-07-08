<?php

namespace JasonRoman\NbaApi\Request\Data\Prod\Schedule;

use JasonRoman\NbaApi\Request\AbstractDataRequest;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Get the league schedule for a given season, starting with preseason. If summer league, gets that schedule.
 */
class LeagueScheduleRequest extends AbstractDataRequest
{
    const ENDPOINT = '/prod/v1/{year}/schedule.json';

    /**
     * @Assert\NotBlank()
     * @Assert\Type("int")
     * @Assert\Range(min = 2015)
     *
     * @var int
     */
    public $year;
}