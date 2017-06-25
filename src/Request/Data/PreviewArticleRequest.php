<?php

namespace JasonRoman\NbaApi\Request\Data;

use JasonRoman\NbaApi\Constraints as ApiAssert;
use JasonRoman\NbaApi\Request\Data\Params\DateParam;
use JasonRoman\NbaApi\Request\Params\GameIdParam;

/**
 * This seems to go away once the game starts or the recap is available.
 */
class PreviewArticleRequest extends AbstractDataApiRequest
{
    const ENDPOINT = '/data/10s/prod/v1/{date}/{gameId}_preview_article.json';

    /**
     * @var string
     * @ApiAssert\ApiRegex(pattern = DateParam::FORMAT)
     */
    public $date;

    /**
     * @ApiAssert\ApiRegex(pattern = GameIdParam::FORMAT)
     * @var string
     */
    public $gameId;
}