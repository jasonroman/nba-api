<?php

namespace JasonRoman\NbaApi\Request\Nba\Wsc\Video;

use Symfony\Component\Validator\Constraints as Assert;
use JasonRoman\NbaApi\Request\Nba\Wsc\AbstractNbaWscRequest;

class VideoRequest extends AbstractNbaWscRequest
{
    const ENDPOINT = '/video/wsc/league/{videoId}.xml';

    /**
     * @Assert\NotBlank()
     * @Assert\Type("string")
     * @Assert\Uuid(strict = false)
     */
    public $videoId;

    /**
     * {@inheritdoc}
     */
    public function getExampleValues(): array
    {
        return [
            'videoId' => '087a6075-00fc-187d-3f9b-10023abe58a3',
        ];
    }
}