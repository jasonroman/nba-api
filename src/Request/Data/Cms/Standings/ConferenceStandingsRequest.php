<?php

namespace JasonRoman\NbaApi\Request\Data\Cms\Standings;

use JasonRoman\NbaApi\Request\Data\Cms\AbstractDataCmsRequest;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Get the conference standings used by the CMS.
 */
class ConferenceStandingsRequest extends AbstractDataCmsRequest
{
    const ENDPOINT = '/json/cms/{year}/standings/conference.json';

    /**
     * @Assert\NotBlank()
     * @Assert\Type("int")
     * @Assert\Range(min = 2011)
     *
     * @var int
     */
    public $year;
}