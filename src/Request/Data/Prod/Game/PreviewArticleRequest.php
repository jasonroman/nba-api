<?php

namespace JasonRoman\NbaApi\Request\Data\Prod\Game;

use Symfony\Component\Validator\Constraints as Assert;
use JasonRoman\NbaApi\Constraints as ApiAssert;
use JasonRoman\NbaApi\Params\Data\GameDateParam;
use JasonRoman\NbaApi\Params\GameIdParam;
use JasonRoman\NbaApi\Request\AbstractDataRequest;

/**
 * Get the preview article for a game. Valid from 2014-2015 regular season and later.
 */
class PreviewArticleRequest extends AbstractDataRequest
{
    const ENDPOINT = '/data/prod/v1/{gameDate}/{gameId}_preview_article.json';

    /**
     * @Assert\NotBlank()
     * @Assert\Date()
     * @Assert\Range(min = GameDateParam::START_DATE_PRE_SEASON_2014)
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