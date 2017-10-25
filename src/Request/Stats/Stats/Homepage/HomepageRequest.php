<?php

namespace JasonRoman\NbaApi\Request\Stats\Stats\Homepage;

use JasonRoman\NbaApi\Constraints as ApiAssert;
use JasonRoman\NbaApi\Params\LeagueIdParam;
use JasonRoman\NbaApi\Params\SeasonParam;
use JasonRoman\NbaApi\Params\Stats\GameScopeParam;
use JasonRoman\NbaApi\Params\Stats\PlayerOrTeamParam;
use JasonRoman\NbaApi\Params\Stats\PlayerScopeParam;
use JasonRoman\NbaApi\Params\Stats\SeasonTypeParam;
use JasonRoman\NbaApi\Params\Stats\StatTypeParam;
use JasonRoman\NbaApi\Request\Stats\Stats\AbstractStatsStatsRequest;
use Symfony\Component\Validator\Constraints as Assert;

class HomepageRequest extends AbstractStatsStatsRequest
{
    const ENDPOINT = '/stats/homepagev2';

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
     * @ApiAssert\ApiRegex(SeasonParam::FORMAT)
     *
     * @var string
     */
    public $season;

    /**
     * @Assert\NotBlank()
     * @Assert\Type("string")
     * @ApiAssert\ApiChoice(SeasonTypeParam::OPTIONS)
     *
     * @var string
     */
    public $seasonType;

    /**
     * @Assert\NotBlank()
     * @Assert\Type("string")
     * @ApiAssert\ApiChoice(StatTypeParam::OPTIONS)
     *
     * @var string
     */
    public $statType;

    /**
     * @Assert\NotBlank()
     * @Assert\Type("string")
     * @ApiAssert\ApiChoice(PlayerOrTeamParam::OPTIONS)
     *
     * @var string
     */
    public $playerOrTeam;

    /**
     * @Assert\NotBlank()
     * @Assert\Type("string")
     * @ApiAssert\ApiChoice(GameScopeParam::OPTIONS)
     *
     * @var string
     */
    public $gameScope;

    /**
     * @Assert\NotBlank()
     * @Assert\Type("string")
     * @ApiAssert\ApiChoice(PlayerScopeParam::OPTIONS)
     *
     * @var string
     */
    public $playerScope;
}