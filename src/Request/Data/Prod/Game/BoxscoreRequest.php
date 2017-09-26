<?php

namespace JasonRoman\NbaApi\Request\Data\Prod\Game;

use JasonRoman\NbaApi\Constraints as ApiAssert;
use JasonRoman\NbaApi\Params\GameIdParam;
use JasonRoman\NbaApi\Request\Data\Prod\AbstractDataProdRequest;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Get the box score of a game. This includes player statistics. Valid from 2014-2015 preseason and later.
 */
class BoxscoreRequest extends AbstractDataProdRequest
{
    const ENDPOINT = '/prod/v1/{gameDate}/{gameId}_boxscore.json';

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