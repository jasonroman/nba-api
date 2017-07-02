<?php

namespace JasonRoman\NbaApi\Request\Data\Team;

use Symfony\Component\Validator\Constraints as Assert;
use JasonRoman\NbaApi\Constraints as ApiAssert;
use JasonRoman\NbaApi\Request\AbstractDataRequest;
use JasonRoman\NbaApi\Request\Params\TeamIdParam;

/**
 * Get statistical leaders of a team for a given season. Same as other request except uses team id, available from 2016.
 */
class TeamLeaders2Request extends AbstractDataRequest
{
    const ENDPOINT = '/data/prod/v1/{year}/teams/{teamId}/leaders.json';

    /**
     * @Assert\NotBlank()
     * @Assert\Type("int")
     * @Assert\Range(min = 2016)
     *
     * @var int
     */
    public $year;

    /**
     * @Assert\NotBlank()
     * @Assert\Type("int")
     * @ApiAssert\ApiChoice(TeamIdParam::OPTIONS)
     *
     * @var int
     */
    public $teamId;
}