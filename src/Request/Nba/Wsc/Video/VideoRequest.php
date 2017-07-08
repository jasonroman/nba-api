<?php

namespace JasonRoman\NbaApi\Request\Nba\Wsc\Video;

use Symfony\Component\Validator\Constraints as Assert;
use JasonRoman\NbaApi\Request\AbstractNbaRequest;

class VideoRequest extends AbstractNbaRequest
{
    const ENDPOINT = '/video/wsc/league/{videoId}.xml';

    /**
     * @Assert\NotBlank()
     * @Assert\Type("string")
     * @Assert\Uuid(strict = false)
     */
    public $videoId;
}