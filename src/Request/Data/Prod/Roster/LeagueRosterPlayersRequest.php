<?php

namespace JasonRoman\NbaApi\Request\Data\Prod\Roster;

use JasonRoman\NbaApi\Request\Data\Prod\AbstractDataProdRequest;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Get all of the players for a given season. This also includes players' overall team history.
 */
class LeagueRosterPlayersRequest extends AbstractDataProdRequest
{
    const ENDPOINT = '/prod/v1/{year}/players.json';

    /**
     * @Assert\NotBlank()
     * @Assert\Type("int")
     * @Assert\Range(min = 2012)
     *
     * @var int
     */
    public $year;
}