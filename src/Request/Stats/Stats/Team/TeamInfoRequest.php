<?php

namespace JasonRoman\NbaApi\Request\Stats\Stats\Player;

use Symfony\Component\Validator\Constraints as Assert;
use JasonRoman\NbaApi\Constraints as ApiAssert;
use JasonRoman\NbaApi\Params\LeagueIdParam;
use JasonRoman\NbaApi\Params\SeasonParam;
use JasonRoman\NbaApi\Params\TeamIdParam;
use JasonRoman\NbaApi\Params\Stats\SeasonTypeParam;
use JasonRoman\NbaApi\Request\AbstractStatsRequest;

class TeamInfoRequest extends AbstractStatsRequest
{
    const ENDPOINT = '/stats/teaminfocommon';

    /**
     * @Assert\NotBlank()
     * @Assert\Type("string")
     * @ApiAssert\ApiRegex(pattern = LeagueIdParam::FORMAT)
     *
     * @var string
     */
    public $leagueId;

    /**
     * @Assert\Type("string")
     * @ApiAssert\ApiRegex(pattern = SeasonParam::FORMAT)
     *
     * @var string
     */
    public $season;

    /**
     * @Assert\Type("string")
     * @ApiAssert\ApiChoice(SeasonTypeParam::OPTIONS_WITH_BOTH_ALL_STAR)
     *
     * @var string
     */
    public $seasonType;

    /**
     * @Assert\NotBlank()
     * @Assert\Type("int")
     * @Assert\Range(min = TeamIdParam::MIN, TeamIdParam::MAX)
     *
     * @var int
     */
    public $teamId;

    /**
     * {@inheritdoc}
     */
    public function getDefaultValues(): array
    {
        return [
            'leagueId' => LeagueIdParam::NBA,
        ];
    }
}