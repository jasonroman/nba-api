<?php

namespace JasonRoman\NbaApi\Request\Data\Prod\Team;

use JasonRoman\NbaApi\Constraints as ApiAssert;
use JasonRoman\NbaApi\Params\TeamIdParam;
use JasonRoman\NbaApi\Request\Data\Prod\AbstractDataProdRequest;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Get statistical leaders of a team for a given season. Same as other request except uses team id, available from 2016.
 */
class TeamLeadersByIdRequest extends AbstractDataProdRequest
{
    const ENDPOINT = '/prod/v1/{year}/teams/{teamId}/leaders.json';

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