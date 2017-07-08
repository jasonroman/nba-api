<?php

namespace JasonRoman\NbaApi\Request\Api\League\News;

use Symfony\Component\Validator\Constraints as Assert;
use JasonRoman\NbaApi\Request\AbstractNbaApiRequest;

/**
 * Retrieve a specific article.
 */
class ArticleRequest extends AbstractNbaApiRequest
{
    const ENDPOINT = '/0/league/article/{articleId}';

    /**
     * @Assert\NotBlank()
     * @Assert\Type("string")
     * @Assert\Uuid(strict = false)
     */
    public $articleId;
}