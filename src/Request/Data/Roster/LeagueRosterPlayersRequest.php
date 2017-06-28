<?php

namespace JasonRoman\NbaApi\Request\Data\Roster;

use Symfony\Component\Validator\Constraints as Assert;
use JasonRoman\NbaApi\Request\Data\AbstractDataApiRequest;

/**
 * Get all of the players for a given season. This also includes players' overall team history.
 */
class LeagueRosterPlayersRequest extends AbstractDataApiRequest
{
    const ENDPOINT = '/data/prod/v1/{year}/players.json';

    /**
     * @Assert\NotBlank()
     * @Assert\Type("int")
     * @Assert\Range(min = 2012)
     *
     * @var int
     */
    public $year;
}