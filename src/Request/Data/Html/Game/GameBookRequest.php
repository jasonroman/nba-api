<?php

namespace JasonRoman\NbaApi\Request\Data\Html\Game;

use Symfony\Component\Validator\Constraints as Assert;
use JasonRoman\NbaApi\Constraints as ApiAssert;
use JasonRoman\NbaApi\Params\Data\GameDateParam;
use JasonRoman\NbaApi\Params\GameIdParam;
use JasonRoman\NbaApi\Request\AbstractDataRequest;

/**
 * Get the game book PDF of a game. Valid from 2010-2011 preseason and later. Use this over the other gamebook endpoint..
 */
class GameBookRequest extends AbstractDataRequest
{
    const ENDPOINT = '/html/nbacom/{year}/gameinfo/{gameDate}/{gameId}_Book.pdf';

    /**
     * @Assert\NotBlank()
     * @Assert\Type("int")
     * @Assert\Range(min = 2010)
     *
     * @var int
     */
    public $year;

    /**
     * @Assert\NotBlank()
     * @Assert\Date()
     * @Assert\Range(min = GameDateParam::START_DATE_PRE_SEASON_2010)
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