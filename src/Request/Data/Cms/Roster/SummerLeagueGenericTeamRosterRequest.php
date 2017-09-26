<?php

namespace JasonRoman\NbaApi\Request\Data\Cms\Roster;

use JasonRoman\NbaApi\Constraints as ApiAssert;
use JasonRoman\NbaApi\Params\TeamSlugParam;
use JasonRoman\NbaApi\Request\Data\Cms\AbstractDataCmsRequest;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Get a team's generic summer league roster - not tied to a league; could be inaccurate; prefer the other endpoint.
 */
class SummerLeagueGenericTeamRosterRequest extends AbstractDataCmsRequest
{
    const ENDPOINT = '/json/sl/cms/noseason/team/{teamSlug}/roster.json';

    /**
     * @Assert\NotBlank()
     * @Assert\Type("string")
     * @ApiAssert\ApiChoice(TeamSlugParam::OPTIONS)
     *
     * @var string
     */
    public $teamSlug;
}