<?php

namespace JasonRoman\NbaApi\Request\Data\MobileTeams\Team;

use Symfony\Component\Validator\Constraints as Assert;
use JasonRoman\NbaApi\Constraints as ApiAssert;
use JasonRoman\NbaApi\Params\Data\LeagueSlugParam;
use JasonRoman\NbaApi\Params\TeamSlugParam;
use JasonRoman\NbaApi\Params\FormatParam;
use JasonRoman\NbaApi\Request\AbstractDataRequest;

/**
 * Get the coaches of a team.
 */
class TeamCoachesRequest extends AbstractDataRequest
{
    const ENDPOINT = '/v2015/{format}/mobile_teams/{leagueSlug}/{year}/teams/{teamSlug}_coach.{format}';

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
     * @Assert\Range(min = 2015)
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