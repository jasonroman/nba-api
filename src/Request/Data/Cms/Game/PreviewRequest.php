<?php

namespace JasonRoman\NbaApi\Request\Data\Cms\Game;

use Symfony\Component\Validator\Constraints as Assert;
use JasonRoman\NbaApi\Constraints as ApiAssert;
use JasonRoman\NbaApi\Params\Data\GameDateParam;
use JasonRoman\NbaApi\Params\GameIdParam;
use JasonRoman\NbaApi\Request\AbstractDataRequest;

/**
 * Get the preview of a game used by the CMS. Valid from 2012-2013 regular season and later.
 */
class PreviewRequest extends AbstractDataRequest
{
    const ENDPOINT = '/json/cms/noseason/game/{gameDate}/{gameId}/preview.json';

    /**
     * @Assert\NotBlank()
     * @Assert\Date()
     * @Assert\Range(min = GameDateParam::CMS_MIN_DATE)
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