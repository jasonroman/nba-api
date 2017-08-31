<?php

namespace JasonRoman\NbaApi\Request\Api\League\Video;

use Symfony\Component\Validator\Constraints as Assert;
use JasonRoman\NbaApi\Constraints as ApiAssert;
use JasonRoman\NbaApi\Params\GameIdParam;
use JasonRoman\NbaApi\Request\Api\League\AbstractApiLeagueRequest;

/**
 * Retrieve videos for a specific game, or just in general. If in general, just gets top X videos for nba.com.
 * This is unique in that the parameters are all query parameters.
 */
class VideoRequest extends AbstractApiLeagueRequest
{
    const ENDPOINT = '/0/league/video';

    /**
     * I have some description.
     *
     * And something else
     *
     * @Assert\NotBlank()
     * @Assert\Type("string")
     * @ApiAssert\ApiRegex(GameIdParam::FORMAT)
     * @ApiAssert\ApiChoice({1, 2, 3})
     *
     * @var asdf
     */
    public $games;

    /**
     * @Assert\Type("int")
     * @Assert\Range(min = 1, max = 100)
     *
     * @var int
     */
    public $count;
}