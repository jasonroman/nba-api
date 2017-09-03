<?php

namespace JasonRoman\NbaApi\Request\Data\Cms\Game;

use Symfony\Component\Validator\Constraints as Assert;
use JasonRoman\NbaApi\Constraints as ApiAssert;
use JasonRoman\NbaApi\Params\Data\GameDateParam;
use JasonRoman\NbaApi\Params\GameIdParam;
use JasonRoman\NbaApi\Request\Data\Cms\AbstractDataCmsRequest;

/**
 * Get the preview of a game used by the CMS. Valid from 2012-2013 regular season and later.
 */
class PreviewRequest extends AbstractDataCmsRequest
{
    const ENDPOINT = '/json/cms/noseason/game/{gameDate}/{gameId}/preview.json';

    /**
     * @Assert\NotBlank()
     * @Assert\Type("\DateTime")
     * @Assert\Range(min = GameDateParam::CMS_MIN_DATE)
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