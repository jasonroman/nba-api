<?php

namespace JasonRoman\NbaApi\Request\Api\League\News;

use Symfony\Component\Validator\Constraints as Assert;
use JasonRoman\NbaApi\Request\Api\League\AbstractApiLeagueRequest;

/**
 * Retrieve a specific article.
 */
class ArticleRequest extends AbstractApiLeagueRequest
{
    const ENDPOINT = '/0/league/article/{articleId}';

    /**
     * Test something else.
     *
     * @Assert\NotBlank()
     * @Assert\Type("string")
     * @Assert\Uuid(strict = false)
     *
     * @var string
     */
    public $articleId;
}