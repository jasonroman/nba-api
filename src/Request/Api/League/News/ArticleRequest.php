<?php

namespace JasonRoman\NbaApi\Request\Api\League\News;

use JasonRoman\NbaApi\Request\Api\League\AbstractApiLeagueRequest;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Retrieve a specific article.
 */
class ArticleRequest extends AbstractApiLeagueRequest
{
    const ENDPOINT = '/0/league/article/{articleId}';

    /**
     * @Assert\NotBlank()
     * @Assert\Type("string")
     * @Assert\Uuid(strict = false)
     *
     * @var string
     */
    public $articleId;

    /**
     * {@inheritdoc}
     */
    public static function getExampleValues(): array
    {
        return [
            'articleId' => '931b388a-eee6-4f0b-bfaf-d1ad77253117',
        ];
    }
}