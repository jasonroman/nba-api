<?php

namespace JasonRoman\NbaApi\Request\Data\Cms\Game;

use Symfony\Component\Validator\Constraints as Assert;
use JasonRoman\NbaApi\Constraints as ApiAssert;
use JasonRoman\NbaApi\Params\GameIdParam;
use JasonRoman\NbaApi\Request\AbstractDataRequest;

/**
 * This seems to get current per-game averages of all players involved with the specified game.
 * The averages appear to be player averages for the current season/type (ex: 2016 regular season).
 * @TODO figure out earliest game later
 */
class PlayersPerGameRequest extends AbstractDataRequest
{
    const ENDPOINT = '/json/cms/{year}/game/{gameDate}/{gameId}/playersPerGame.json';

    /**
     * @Assert\NotBlank()
     * @Assert\Type("int")
     *
     * @var int
     */
    public $year;

    /**
     * @Assert\NotBlank()
     * @Assert\Date()
     *
     * @var \DateTime|string if string, format is YYYY-MM-DD
     */
    public $gameDate;

    /**
     * @Assert\NotBlank()
     * @Assert\Type("string")
     * @ApiAssert\ApiRegex(pattern = GameIdParam::FORMAT)
     *
     * @var string
     */
    public $gameId;
}