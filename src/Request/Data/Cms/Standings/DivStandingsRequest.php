<?php

namespace JasonRoman\NbaApi\Request\Data\Cms\Standings;

use Symfony\Component\Validator\Constraints as Assert;
use JasonRoman\NbaApi\Request\AbstractDataRequest;

/**
 * Get the division standings used by the CMS.
 */
class DivStandingsRequest extends AbstractDataRequest
{
    const ENDPOINT = '/json/cms/{year}/standings/division.json';

    /**
     * @Assert\NotBlank()
     * @Assert\Type("int")
     * @Assert\Range(min = 2011)
     *
     * @var int
     */
    public $year;
}