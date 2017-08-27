<?php

namespace JasonRoman\NbaApi\Request\Stats\Feeds\Team;

use Symfony\Component\Validator\Constraints as Assert;
use JasonRoman\NbaApi\Params\TeamIdParam;
use JasonRoman\NbaApi\Request\AbstractStatsRequest;

class TeamProfileRequest extends AbstractStatsRequest
{
    const ENDPOINT = '/feeds/teams/profile/{teamId}_TeamProfile.js';

    /**
     * @Assert\NotBlank()
     * @Assert\Type("int")
     * @Assert\Range(min = TeamIdParam::MIN, max = TeamIdParam::MAX)
     *
     * @var int
     */
    public $teamId;
}