<?php

namespace JasonRoman\NbaApi\Request\Data\Cms\Roster;

use JasonRoman\NbaApi\Constraints as ApiAssert;
use JasonRoman\NbaApi\Params\Data\SummerLeagueAbbrevParam;
use JasonRoman\NbaApi\Params\TeamSlugParam;
use JasonRoman\NbaApi\Request\Data\Cms\AbstractDataCmsRequest;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Get a team's summer league roster.
 */
class SummerLeagueTeamRosterRequest extends AbstractDataCmsRequest
{
    // the SL_{}/ portion *can* be left off, but should be used in case a team is in multiple summer leagues
    const ENDPOINT = '/json/sl/cms/noseason/team/{teamSlug}/{summerLeagueAbbrev}/roster.json';

    /**
     * @Assert\NotBlank()
     * @Assert\Type("string")
     * @ApiAssert\ApiChoice(TeamSlugParam::OPTIONS)
     *
     * @var string
     */
    public $teamSlug;

    /**
     * @Assert\NotBlank()
     * @Assert\Type("string")
     * @ApiAssert\ApiChoice(SummerLeagueAbbrevParam::OPTIONS)
     *
     * @var string
     */
    public $summerLeagueAbbrev;
}