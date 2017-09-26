<?php

namespace JasonRoman\NbaApi\Request\Api\League\Video;

use JasonRoman\NbaApi\Request\Api\League\AbstractApiLeagueRequest;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Retrieve a collection of videos and their information/ids. Collection id appears to be tied to specific
 * video categories, but there does not seem to be an endpoint that retrieves these categories. Should mark
 * existing ones and see if they change over time.
 */
class VideoCollectionRequest extends AbstractApiLeagueRequest
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

    /**
     * {@inheritdoc}
     */
    public static function getExampleValues(): array
    {
        return [
            'collectionId' => '47b76848-028b-4536-9c9c-37379d209639',
        ];
    }
}