<?php

namespace JasonRoman\NbaApi\Request\Stats\Feeds\Team;

use JasonRoman\NbaApi\Params\TeamIdParam;
use JasonRoman\NbaApi\Request\Stats\Feeds\AbstractStatsFeedsRequest;
use Symfony\Component\Validator\Constraints as Assert;

class TeamProfileRequest extends AbstractStatsFeedsRequest
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