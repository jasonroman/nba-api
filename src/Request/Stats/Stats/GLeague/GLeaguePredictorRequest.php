<?php

namespace JasonRoman\NbaApi\Request\Stats\Stats\GLeague;

use JasonRoman\NbaApi\Constraints as ApiAssert;
use JasonRoman\NbaApi\Params\SeasonParam;
use JasonRoman\NbaApi\Params\TeamIdParam;
use JasonRoman\NbaApi\Request\Stats\Stats\AbstractStatsStatsRequest;
use Symfony\Component\Validator\Constraints as Assert;

class GLeaguePredictorRequest extends AbstractStatsStatsRequest
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

    /**
     * {@inheritdoc}
     */
    public static function getExampleValues(): array
    {
        return array_merge(parent::getExampleValues(), [
            'nbaTeamId'     => TeamIdParam::DETROIT_PISTONS,
            'dLeagueTeamId' => TeamIdParam::GRAND_RAPIDS_DRIVE,
        ]);
    }
}