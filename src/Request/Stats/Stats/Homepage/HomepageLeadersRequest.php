<?php

namespace JasonRoman\NbaApi\Request\Stats\Homepage;

use Symfony\Component\Validator\Constraints as Assert;
use JasonRoman\NbaApi\Constraints as ApiAssert;
use JasonRoman\NbaApi\Params\LeagueIdParam;
use JasonRoman\NbaApi\Params\SeasonParam;
use JasonRoman\NbaApi\Params\Stats\GameScopeParam;
use JasonRoman\NbaApi\Params\Stats\PlayerOrTeamParam;
use JasonRoman\NbaApi\Params\Stats\PlayerScopeParam;
use JasonRoman\NbaApi\Params\Stats\SeasonTypeParam;
use JasonRoman\NbaApi\Params\Stats\StatCategoryParam;
use JasonRoman\NbaApi\Request\AbstractStatsRequest;

class HomepageLeadersRequest extends AbstractStatsRequest
{
    const ENDPOINT = '/stats/homepageleaders';

    /**
     * @Assert\NotBlank()
     * @Assert\Type("string")
     * @ApiAssert\ApiRegex(pattern = LeagueIdParam::FORMAT)
     *
     * @var string
     */
    public $leagueId;

    /**
     * @Assert\NotBlank()
     * @Assert\Type("DateTime")
     * @ApiAssert\ApiRegex(pattern = SeasonParam::FORMAT)
     *
     * @var string
     */
    public $gameDate;

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
     * @ApiAssert\ApiChoice(StatCategoryParam::OPTIONS)
     *
     * @var string
     */
    public $statCategory;

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