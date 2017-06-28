<?php

namespace JasonRoman\NbaApi\Request\Data\Roster;

use Symfony\Component\Validator\Constraints as Assert;
use JasonRoman\NbaApi\Request\Data\AbstractDataApiRequest;

/**
 * Get the team head and assistant coaches for a season.
 */
class LeagueRosterCoachesRequest extends AbstractDataApiRequest
{
    const ENDPOINT = '/data/prod/v1/{year}/coaches.json';

    /**
     * @Assert\NotBlank()
     * @Assert\Type("int")
     * @Assert\Range(min = 2015)
     *
     * @var int
     */
    public $year;
}