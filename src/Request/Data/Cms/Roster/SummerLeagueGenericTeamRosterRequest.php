<?php

namespace JasonRoman\NbaApi\Request\Data\Cms\Roster;

use Symfony\Component\Validator\Constraints as Assert;
use JasonRoman\NbaApi\Constraints as ApiAssert;
use JasonRoman\NbaApi\Request\AbstractDataRequest;
use JasonRoman\NbaApi\Params\Data\TeamSlugParam;

/**
 * Get a team's generic summer league roster - not tied to a league; could be inaccurate; prefer the other endpoint.
 */
class SummerLeagueGenericTeamRosterRequest extends AbstractDataRequest
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