<?php

namespace JasonRoman\NbaApi\Request\GLeague\Api\Team;

use JasonRoman\NbaApi\Params\GLeague\SubdomainSlugParam;
use JasonRoman\NbaApi\Params\SeasonParam;
use JasonRoman\NbaApi\Params\TeamIdParam;
use JasonRoman\NbaApi\Request\AbstractGLeagueRequest;

class TeamAssignmentsRequest extends AbstractGLeagueRequest
{
    const ENDPOINT = '/wp-json/api/v1/assignments.json';

    /**
     * @Assert\NotBlank()
     * @Assert\Type("string")
     * @ApiAssert\ApiChoice(SubdomainSlugParam::OPTIONS)
     *
     * @var string
     */
    public $subdomainSlug;

    /**
     * This does not appear to have any effect, even if changing the value.
     *
     * @Assert\Type("string")
     * @ApiAssert\ApiRegex(pattern = SeasonParam::FORMAT)
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