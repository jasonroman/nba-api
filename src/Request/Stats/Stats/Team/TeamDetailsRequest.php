<?php

namespace JasonRoman\NbaApi\Request\Stats\Stats\Player;

use Symfony\Component\Validator\Constraints as Assert;
use JasonRoman\NbaApi\Params\TeamIdParam;
use JasonRoman\NbaApi\Request\AbstractStatsRequest;

class TeamDetailsRequest extends AbstractStatsRequest
{
    const ENDPOINT = '/stats/teamdetails';

    /**
     * @Assert\NotBlank()
     * @Assert\Type("int")
     * @Assert\Range(min = TeamIdParam::MIN, TeamIdParam::MAX)
     *
     * @var int
     */
    public $teamId;
}