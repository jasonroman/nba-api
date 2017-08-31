<?php

namespace JasonRoman\NbaApi\Request\Data\Cms\Standings;

use Symfony\Component\Validator\Constraints as Assert;
use JasonRoman\NbaApi\Request\Data\Cms\AbstractDataCmsRequest;

/**
 * Get the full standings used by the CMS.
 */
class StandingsRequest extends AbstractDataCmsRequest
{
    const ENDPOINT = '/json/cms/{year}/league/standings.json';

    /**
     * @Assert\NotBlank()
     * @Assert\Type("int")
     * @Assert\Range(min = 2013)
     *
     * @var int
     */
    public $year;
}