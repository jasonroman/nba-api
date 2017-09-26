<?php

namespace JasonRoman\NbaApi\Request\Data\Prod\Playoffs;

use JasonRoman\NbaApi\Request\Data\Prod\AbstractDataProdRequest;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Get the playoff brackets for a season.
 */
class PlayoffsBracketRequest extends AbstractDataProdRequest
{
    const ENDPOINT = '/prod/v1/{year}/playoffsBracket.json';

    /**
     * @Assert\NotBlank()
     * @Assert\Type("int")
     * @Assert\Range(min = 2016)
     *
     * @var int
     */
    public $year;
}