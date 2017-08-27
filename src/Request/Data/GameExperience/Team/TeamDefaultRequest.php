<?php

namespace JasonRoman\NbaApi\Request\Data\GameExperience\Team;

use Symfony\Component\Validator\Constraints as Assert;
use JasonRoman\NbaApi\Constraints as ApiAssert;
use JasonRoman\NbaApi\Params\TeamSlugParam;
use JasonRoman\NbaApi\Request\AbstractDataRequest;

/**
 * Get the brand information for a particular team.
 */
class TeamDefaultRequest extends AbstractDataRequest
{
    const ENDPOINT = '/json/ge/{teamSlug}/default.json';

    /**
     * @Assert\NotBlank()
     * @Assert\Type("string")
     * @ApiAssert\ApiChoice(TeamSlugParam::OPTIONS)
     *
     * @var string
     */
    public $teamSlug;
}