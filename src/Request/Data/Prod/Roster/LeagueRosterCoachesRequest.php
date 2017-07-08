<?php

namespace JasonRoman\NbaApi\Request\Data\Prod\Roster;

use Symfony\Component\Validator\Constraints as Assert;
use JasonRoman\NbaApi\Request\AbstractDataRequest;

/**
 * Get the team head and assistant coaches for a season.
 */
class LeagueRosterCoachesRequest extends AbstractDataRequest
{
    const ENDPOINT = '/prod/v1/{year}/coaches.json';

    /**
     * @Assert\NotBlank()
     * @Assert\Type("int")
     * @Assert\Range(min = 2015)
     *
     * @var int
     */
    public $year;
}