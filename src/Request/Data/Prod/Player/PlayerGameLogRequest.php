<?php

namespace JasonRoman\NbaApi\Request\Data\Prod\Player;

use Symfony\Component\Validator\Constraints as Assert;
use JasonRoman\NbaApi\Params\PlayerIdParam;
use JasonRoman\NbaApi\Request\Data\Prod\AbstractDataProdRequest;

/**
 * Get basic stats and game information for a player. Appears to only show the last 3 games the player played in.
 */
class PlayerGameLogRequest extends AbstractDataProdRequest
{
    const ENDPOINT = '/prod/v1/{year}/players/{playerId}_gamelog.json';

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
     * @Assert\Range(min = PlayerIdParam::MIN, max = PlayerIdParam::MAX)
     *
     * @var int
     */
    public $playerId;
}