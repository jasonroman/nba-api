<?php

namespace JasonRoman\NbaApi\Request\Data\Game;

use Symfony\Component\Validator\Constraints as Assert;
use JasonRoman\NbaApi\Constraints as ApiAssert;
use JasonRoman\NbaApi\Params\Data\GameDateParam;
use JasonRoman\NbaApi\Params\GameIdParam;
use JasonRoman\NbaApi\Request\Data\AbstractDataApiRequest;

/**
 * Get the mini-box score of a game. This does not include player statistics. Valid from 2014-2015 preseason and later.
 */
class MiniBoxscoreRequest extends AbstractDataApiRequest
{
    const ENDPOINT = '/data/prod/v1/{ganmeDate}/{gameId}_mini_boxscore.json';

    /**
     * @Assert\NotBlank()
     * @Assert\Date()
     * @Assert\Range(min = GameDateParam::MIN_DATE)
     *
     * @var \DateTime
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