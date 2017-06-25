<?php

namespace JasonRoman\NbaApi\Request\Nba;

use Symfony\Component\Validator\Constraints as Assert;

class VideoRequest extends AbstractNbaApiRequest
{
    const ENDPOINT = '/video/wsc/league/{videoId}.xml';

    /**
     * @Assert\Uuid(strict = false, message = "Video identifier must be a valid UUID.")
     * @Assert\NotBlank()
     */
    public $videoId;
}