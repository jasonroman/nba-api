<?php

namespace JasonRoman\NbaApi\Request\Data\Cms\Game;

use Symfony\Component\Validator\Constraints as Assert;
use JasonRoman\NbaApi\Constraints as ApiAssert;
use JasonRoman\NbaApi\Params\Data\GameDateParam;
use JasonRoman\NbaApi\Params\GameIdParam;
use JasonRoman\NbaApi\Request\AbstractDataRequest;

/**
 * Get the full play-by-play for a game used by the CMS. Valid from xxxx-xxxx preseason and later.
 * @TODO find when valid from
 */
class FullPlayByPlayRequest extends AbstractDataRequest
{
    const ENDPOINT = '/json/cms/noseason/game/{gameDate}/{gameId}/pbp_all.json';

    /**
     * @Assert\NotBlank()
     * @Assert\Date()
     * @Assert\Range(min = GameDateParam::START_DATE_PRE_SEASON_2012)
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