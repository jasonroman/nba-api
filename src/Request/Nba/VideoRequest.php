<?php

namespace JasonRoman\NbaApi\Request\Nba;

use Symfony\Component\Validator\Constraints as Assert;
use JasonRoman\NbaApi\Constraints as ApiAssert;
use JasonRoman\NbaApi\Params\FormatParam;
use JasonRoman\NbaApi\Request\AbstractNbaRequest;

class VideoRequest extends AbstractNbaRequest
{
    const ENDPOINT = '/video/wsc/league/{videoId}.{format}';

    /**
     * @Assert\NotBlank()
     * @Assert\Type("string")
     * @ApiAssert\ApiChoice({FormatParam::XML})
     *
     * @var string
     */
    public $format;

    /**
     * @Assert\NotBlank()
     * @Assert\Type("string")
     * @Assert\Uuid(strict = false)
     */
    public $videoId;

    /**
     * {@inheritdoc}
     */
    public function getDefaultValues() : array
    {
        return ['format' => FormatParam::XML];
    }
}