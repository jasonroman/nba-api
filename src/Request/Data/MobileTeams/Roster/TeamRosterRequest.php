<?php

namespace JasonRoman\NbaApi\Request\Data\MobileTeams\Roster;

use Symfony\Component\Validator\Constraints as Assert;
use JasonRoman\NbaApi\Constraints as ApiAssert;
use JasonRoman\NbaApi\Request\Data\MobileTeams\AbstractDataMobileTeamsRequest;
use JasonRoman\NbaApi\Params\Data\LeagueSlugParam;
use JasonRoman\NbaApi\Params\TeamSlugParam;
use JasonRoman\NbaApi\Params\FormatParam;

/**
 * Get all of the current players on a team for the given league and year/season.
 */
class TeamRosterRequest extends AbstractDataMobileTeamsRequest
{
    const ENDPOINT = '/v2015/{format}/mobile_teams/{leagueSlug}/{year}/teams/{teamSlug}_roster.{format}';

    /**
     * @Assert\NotBlank()
     * @Assert\Type("string")
     * @ApiAssert\ApiChoice(FormatParam::OPTIONS)
     *
     * @var string
     */
    public $format;

    /**
     * @Assert\NotBlank()
     * @Assert\Type("string")
     * @ApiAssert\ApiChoice(LeagueSlugParam::OPTIONS)
     *
     * @var string
     */
    public $leagueSlug;

    /**
     * @Assert\NotBlank()
     * @Assert\Type("int")
     * @Assert\Range(min = 2014)
     *
     * @var int
     */
    public $year;

    /**
     * @Assert\NotBlank()
     * @Assert\Type("string")
     * @ApiAssert\ApiChoice(TeamSlugParam::OPTIONS)
     *
     * @var string
     */
    public $teamSlug;
}