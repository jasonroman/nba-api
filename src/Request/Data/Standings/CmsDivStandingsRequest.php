<?php

namespace JasonRoman\NbaApi\Request\Data\Standings;

use Symfony\Component\Validator\Constraints as Assert;
use JasonRoman\NbaApi\Request\Data\AbstractDataApiRequest;

/**
 * Get the division standings used by the CMS.
 */
class CmsDivStandingsRequest extends AbstractDataApiRequest
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