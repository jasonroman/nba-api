<?php

namespace JasonRoman\NbaApi\Request\Data\Player;

use Symfony\Component\Validator\Constraints as Assert;
use JasonRoman\NbaApi\Request\Data\AbstractDataApiRequest;

/**
 * Get basic stats and game information for a player. Appears to only show the last 3 games the player played in.
 */
class PlayerGameLogRequest extends AbstractDataApiRequest
{
    const ENDPOINT = '/data/prod/v1/{year}/players/{playerId}_gamelog.json';

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
     * @Assert\Type("int")
     * @Assert\Range(min = 1, max = 2147483647)
     *
     * @var int
     */
    public $playerId;
}