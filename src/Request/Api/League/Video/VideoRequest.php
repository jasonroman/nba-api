<?php

namespace JasonRoman\NbaApi\Request\Api\League\Video;

use Symfony\Component\Validator\Constraints as Assert;
use JasonRoman\NbaApi\Constraints as ApiAssert;
use JasonRoman\NbaApi\Request\AbstractApiRequest;
use JasonRoman\NbaApi\Params\GameIdParam;

/**
 * Retrieve videos for a specific game, or just in general. If in general, just gets top X videos for nba.com.
 * This is unique in that the parameters are all query parameters.
 */
class VideoRequest extends AbstractApiRequest
{
    const ENDPOINT = '/0/league/video';

    /**
     * @Assert\NotBlank()
     * @Assert\Type("string")
     * @ApiAssert\ApiRegex(pattern = GameIdParam::FORMAT)
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
}