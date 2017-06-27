<?php

namespace JasonRoman\NbaApi\Request\Data\Standings;

use Symfony\Component\Validator\Constraints as Assert;
use JasonRoman\NbaApi\Request\Data\AbstractDataApiRequest;

/**
 * Get the full standings used by the CMS.
 */
class CmsStandingsRequest extends AbstractDataApiRequest
{
    const ENDPOINT = '/data/json/cms/{year}/league/standings.json';

    /**
     * @Assert\NotBlank()
     * @Assert\Type("int")
     * @Assert\Range(min = 2013)
     *
     * @var int
     */
    public $year;
}