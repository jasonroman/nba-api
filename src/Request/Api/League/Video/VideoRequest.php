<?php

namespace JasonRoman\NbaApi\Request\Api\League\Video;

use JasonRoman\NbaApi\Constraints as ApiAssert;
use JasonRoman\NbaApi\Params\GameIdParam;
use JasonRoman\NbaApi\Request\Api\League\AbstractApiLeagueRequest;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Retrieve videos for a specific game, or just in general. If in general, just gets top X videos for nba.com.
 * This is unique in that the parameters are all query parameters.
 */
class VideoRequest extends AbstractApiLeagueRequest
{
    const ENDPOINT = '/0/league/video';

    /**
     * @Assert\NotBlank()
     * @Assert\Type("string")
     * @ApiAssert\ApiRegex(GameIdParam::FORMAT)
     *
     * @var string
     */
    public $games;

    /**
     * @Assert\Type("int")
     * @Assert\Range(min = 1, max = 100)
     *
     * @var int
     */
    public $count;

    /**
     * {@inheritdoc}
     */
    public static function getExampleValues(): array
    {
        return [
            'games' => GameIdParam::getExampleValue(),
        ];
    }
}