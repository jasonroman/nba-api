<?php

namespace JasonRoman\NbaApi\Request\Data\Cms\Game;

use Symfony\Component\Validator\Constraints as Assert;
use JasonRoman\NbaApi\Constraints as ApiAssert;
use JasonRoman\NbaApi\Params\Data\GameDateParam;
use JasonRoman\NbaApi\Params\GameIdParam;
use JasonRoman\NbaApi\Request\Data\Cms\AbstractDataCmsRequest;

/**
 * Get the full play-by-play for a game used by the CMS. Valid from xxxx-xxxx preseason and later.
 * @TODO find when valid from
 */
class FullPlayByPlayRequest extends AbstractDataCmsRequest
{
    const ENDPOINT = '/json/cms/noseason/game/{gameDate}/{gameId}/pbp_all.json';

    /**
     * @Assert\NotBlank()
     * @Assert\Type("\DateTime")
     * @Assert\Range(min = GameDateParam::START_DATE_PRE_SEASON_2012)
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