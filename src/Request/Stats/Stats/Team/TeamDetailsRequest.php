<?php

namespace JasonRoman\NbaApi\Request\Stats\Stats\Team;

use JasonRoman\NbaApi\Params\TeamIdParam;
use JasonRoman\NbaApi\Request\Stats\Stats\AbstractStatsStatsRequest;
use Symfony\Component\Validator\Constraints as Assert;

class TeamDetailsRequest extends AbstractStatsStatsRequest
{
    const ENDPOINT = '/stats/teamdetails';

    /**
     * @Assert\NotBlank()
     * @Assert\Type("int")
     * @Assert\Range(min = TeamIdParam::MIN, max = TeamIdParam::MAX)
     *
     * @var int
     */
    public $teamId;
}