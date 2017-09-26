<?php

namespace JasonRoman\NbaApi\Request\Data\Cms\Game;

use JasonRoman\NbaApi\Constraints as ApiAssert;
use JasonRoman\NbaApi\Params\GameIdParam;
use JasonRoman\NbaApi\Request\Data\Cms\AbstractDataCmsRequest;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Get the box score of a game used by the CMS. Valid from 2012-2013 preseason and later.
 */
class BoxscoreRequest extends AbstractDataCmsRequest
{
    const ENDPOINT = '/json/cms/noseason/game/{gameDate}/{gameId}/boxscore.json';

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