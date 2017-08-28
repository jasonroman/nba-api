<?php

namespace JasonRoman\NbaApi\Request\Stats\Stats\GLeague;

use Symfony\Component\Validator\Constraints as Assert;
use JasonRoman\NbaApi\Constraints as ApiAssert;
use JasonRoman\NbaApi\Params\SeasonParam;
use JasonRoman\NbaApi\Params\TeamIdParam;
use JasonRoman\NbaApi\Request\AbstractStatsRequest;

class GLeaguePredictorRequest extends AbstractStatsRequest
{
    const ENDPOINT = '/stats/dleaguepredictor';

    /**
     * @Assert\NotBlank()
     * @Assert\Type("string")
     * @ApiAssert\ApiRegex(SeasonParam::FORMAT)
     *
     * @var string
     */
    public $season;

    /**
     * @Assert\Type("int")
     * @Assert\Range(min = TeamIdParam::MIN_ALL, max = TeamIdParam::MAX)
     *
     * @var int
     */
    public $nbaTeamId;

    /**
     * @Assert\Type("int")
     * @Assert\Range(min = TeamIdParam::MIN_ALL, max = TeamIdParam::MAX)
     *
     * @var int
     */
    public $dLeagueTeamId;
}