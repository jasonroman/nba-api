<?php

namespace JasonRoman\NbaApi\Request\Api\League\Video;

use Symfony\Component\Validator\Constraints as Assert;
use JasonRoman\NbaApi\Request\AbstractApiRequest;

/**
 * Retrieve a collection of videos and their information/ids. Collection id appears to be tied to specific
 * video categories, but there does not seem to be an endpoint that retrieves these categories. Should mark
 * existing ones and see if they change over time.
 */
class VideoCollectionRequest extends AbstractApiRequest
{
    const ENDPOINT = '/0/league/collection/{collectionId}';

    /**
     * @Assert\NotBlank()
     * @Assert\Type("string")
     * @Assert\Uuid(strict = false)
     *
     * @var string
     */
    public $collectionId;
}