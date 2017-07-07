<?php

namespace JasonRoman\NbaApi\Request\Data\Cms\Roster;

use Symfony\Component\Validator\Constraints as Assert;
use JasonRoman\NbaApi\Constraints as ApiAssert;
use JasonRoman\NbaApi\Request\AbstractDataRequest;
use JasonRoman\NbaApi\Params\Data\SummerLeagueAbbrevParam;
use JasonRoman\NbaApi\Params\Data\TeamSlugParam;

/**
 * Get a team's summer league roster.
 */
class TeamRosterRequest extends AbstractDataRequest
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