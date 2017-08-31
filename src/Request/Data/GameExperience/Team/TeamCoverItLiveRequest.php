<?php

namespace JasonRoman\NbaApi\Request\Data\GameExperience\Team;

use Symfony\Component\Validator\Constraints as Assert;
use JasonRoman\NbaApi\Constraints as ApiAssert;
use JasonRoman\NbaApi\Params\TeamSlugParam;
use JasonRoman\NbaApi\Request\Data\GameExperience\AbstractDataGameExperienceRequest;

/**
 * Cover-it-live information; seems to just apply to summer league games.
 */
class TeamCoverItLiveRequest extends AbstractDataGameExperienceRequest
{
    const ENDPOINT = '/json/ge/{teamSlug}/{year}-coverit-live.json';

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
     * @Assert\Type("int")
     * @Assert\Range(min = 2015)
     *
     * @var int
     */
    public $year;
}