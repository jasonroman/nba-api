<?php

namespace JasonRoman\NbaApi\Request\Stats\Stats\Homepage;

use JasonRoman\NbaApi\Constraints as ApiAssert;
use JasonRoman\NbaApi\Params\LeagueIdParam;
use JasonRoman\NbaApi\Params\SeasonParam;
use JasonRoman\NbaApi\Params\Stats\PerModeParam;
use JasonRoman\NbaApi\Params\Stats\ScopeParam;
use JasonRoman\NbaApi\Params\Stats\SeasonTypeParam;
use JasonRoman\NbaApi\Params\Stats\StatParam;
use JasonRoman\NbaApi\Request\Stats\Stats\AbstractStatsStatsRequest;
use Symfony\Component\Validator\Constraints as Assert;

class LeagueLeadersRequest extends AbstractStatsStatsRequest
{
    const ENDPOINT = '/stats/leagueleaders';

    /**
     * @Assert\NotBlank()
     * @Assert\Type("string")
     * @ApiAssert\ApiRegex(LeagueIdParam::FORMAT)
     *
     * @var string
     */
    public $leagueId;

    /**
     * @Assert\NotBlank()
     * @Assert\Type("string")
     * @ApiAssert\ApiRegex(SeasonParam::FORMAT_WITH_ALL_TIME)
     *
     * @var string
     */
    public $season;

    /**
     * @Assert\NotBlank()
     * @Assert\Type("string")
     * @ApiAssert\ApiChoice(SeasonTypeParam::OPTIONS_WITH_ALL_STAR)
     *
     * @var string
     */
    public $seasonType;

    /**
     * @Assert\NotBlank()
     * @Assert\Type("string")
     * @ApiAssert\ApiChoice(StatParam::OPTIONS)
     *
     * @var string
     */
    public $statCategory;

    /**
     * @Assert\NotBlank()
     * @Assert\Type("string")
     * @ApiAssert\ApiChoice(PerModeParam::OPTIONS_TOTALS_PER_GAME_PER_48)
     *
     * @var string
     */
    public $perMode;

    /**
     * @Assert\NotBlank()
     * @Assert\Type("string")
     * @ApiAssert\ApiChoice(ScopeParam::OPTIONS)
     *
     * @var string
     */
    public $scope;

    /**
     * @Assert\Type("bool")
     *
     * @var bool
     */
    public $activeFlag;

    /**
     * {@inheritdoc}
     */
    public static function getExampleValues(): array
    {
        return array_merge(parent::getExampleValues(), [
            'statCategory' => StatParam::POINTS,
        ]);
    }
}