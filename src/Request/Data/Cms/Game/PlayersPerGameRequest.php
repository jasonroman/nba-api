<?php

namespace JasonRoman\NbaApi\Request\Data\Cms\Game;

use JasonRoman\NbaApi\Constraints as ApiAssert;
use JasonRoman\NbaApi\Params\GameIdParam;
use JasonRoman\NbaApi\Request\Data\Cms\AbstractDataCmsRequest;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * This seems to get current per-game averages of all players involved with the specified game.
 * The averages appear to be player averages for the current season/type (ex: 2016 regular season).
 */
class PlayersPerGameRequest extends AbstractDataCmsRequest
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
     * @Assert\Type("\DateTime")
     *
     * @var \DateTime
     */
    public $gameDate;

    /**
     * @Assert\NotBlank()
     * @Assert\Type("string")
     * @ApiAssert\ApiRegex(GameIdParam::FORMAT)
     *
     * @var string
     */
    public $gameId;
}