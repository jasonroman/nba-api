<?php

namespace JasonRoman\NbaApi\Request\GLeague\Api\Team;

use Symfony\Component\Validator\Constraints as Assert;
use JasonRoman\NbaApi\Constraints as ApiAssert;
use JasonRoman\NbaApi\Params\GLeague\SubdomainTeamSlugParam;
use JasonRoman\NbaApi\Params\SeasonParam;
use JasonRoman\NbaApi\Params\TeamIdParam;
use JasonRoman\NbaApi\Request\AbstractGLeagueRequest;

class TeamAssignmentsRequest extends AbstractGLeagueRequest
{
    const ENDPOINT = '/wp-json/api/v1/assignments.json';

    /**
     * @Assert\NotBlank()
     * @Assert\Type("string")
     * @ApiAssert\ApiChoice(SubdomainTeamSlugParam::OPTIONS)
     *
     * @var string
     */
    public $subdomainTeamSlug;

    /**
     * This does not appear to have any effect, even if changing the value.
     *
     * @Assert\Type("string")
     * @ApiAssert\ApiRegex(SeasonParam::FORMAT)
     *
     * @var string
     */
    public $season;

    /**
     * Even though using the subdomain slug, this is still required and must be the id that matches the subdomain slug.
     *
     * @Assert\Type("int")
     * @Assert\Range(min = TeamIdParam::MIN, max = TeamIdParam::MAX)
     *
     * @var int
     */
    public $teamId;

    /**
     * @Assert\Type("bool")
     *
     * @var bool
     */
    public $recalled;
}