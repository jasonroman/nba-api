<?php

namespace JasonRoman\NbaApi\Request\Data\Cms\Roster;

use JasonRoman\NbaApi\Constraints as ApiAssert;
use JasonRoman\NbaApi\Params\TeamSlugParam;
use JasonRoman\NbaApi\Request\Data\Cms\AbstractDataCmsRequest;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Get a team's summer league roster.
 */
class TeamRosterRequest extends AbstractDataCmsRequest
{
    const ENDPOINT = '/json/cms/noseason/team/{teamSlug}/roster.json';

    /**
     * @Assert\NotBlank()
     * @Assert\Type("string")
     * @ApiAssert\ApiChoice(TeamSlugParam::OPTIONS)
     *
     * @var string
     */
    public $teamSlug;
}