<?php

namespace JasonRoman\NbaApi\Request\Data\Prod\Game;

use JasonRoman\NbaApi\Constraints as ApiAssert;
use JasonRoman\NbaApi\Params\GameIdParam;
use JasonRoman\NbaApi\Request\Data\Prod\AbstractDataProdRequest;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Get the preview article for a game. Valid from 2014-2015 regular season and possibly later.
 */
class PreviewRequest extends AbstractDataProdRequest
{
    const ENDPOINT = '/prod/v1/{gameDate}/{gameId}_preview_article.json';

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

    /**
     * {@inheritdoc}
     */
    public static function getExampleValues(): array
    {
        return [
            'gameDate' => new \DateTime('2015-02-01'),
            'gameId'   => '0021400717',
        ];
    }
}