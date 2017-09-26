<?php

namespace JasonRoman\NbaApi\Request\Data\Prod\Roster;

use JasonRoman\NbaApi\Request\Data\Prod\AbstractDataProdRequest;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Get the team head and assistant coaches for a season.
 */
class LeagueRosterCoachesRequest extends AbstractDataProdRequest
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