<?php

namespace JasonRoman\NbaApi\Request\Data\Team;

use Symfony\Component\Validator\Constraints as Assert;
use JasonRoman\NbaApi\Constraints as ApiAssert;
use JasonRoman\NbaApi\Request\AbstractDataRequest;
use JasonRoman\NbaApi\Params\Data\TeamSlugParam;

/**
 * Get statistical leaders of a team for a given season. Available from 2015.
 */
class TeamLeadersRequest extends AbstractDataRequest
{
    const ENDPOINT = '/data/prod/v1/{year}/teams/{teamSlug}/leaders.json';

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