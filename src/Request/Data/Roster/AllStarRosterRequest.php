<?php

namespace JasonRoman\NbaApi\Request\Data\Roster;

use Symfony\Component\Validator\Constraints as Assert;
use JasonRoman\NbaApi\Request\Data\AbstractDataApiRequest;

/**
 * Get the All-Star rosters. This includes additional teams like USA vs. World (formerly Rookies vs. Sophomores).
 */
class AllStarRosterRequest extends AbstractDataApiRequest
{
    const ENDPOINT = '/data/prod/v1/allstar/{year}/AS_roster.json';

    /**
     * @Assert\NotBlank()
     * @Assert\Type("int")
     * @Assert\Range(min = 2016)
     *
     * @var int
     */
    public $year;
}