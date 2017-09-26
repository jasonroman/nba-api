<?php

namespace JasonRoman\NbaApi\Request\Data\Cms\Standings;

use JasonRoman\NbaApi\Request\Data\Cms\AbstractDataCmsRequest;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Get the division standings used by the CMS.
 */
class DivisionStandingsRequest extends AbstractDataCmsRequest
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