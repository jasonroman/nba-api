<?php

namespace JasonRoman\NbaApi\Tests\Integration\Client;

use JasonRoman\NbaApi\Client\StatsFeedsClient;
use JasonRoman\NbaApi\Client\StatsStatsClient;
use JasonRoman\NbaApi\Client\StatsWidgetClient;
use JasonRoman\NbaApi\Params\Stats\CounterParam;
use JasonRoman\NbaApi\Params\Stats\DirectionParam;
use JasonRoman\NbaApi\Params\Stats\GameScopeParam;
use JasonRoman\NbaApi\Params\Stats\PlayerOrTeamParam;
use JasonRoman\NbaApi\Params\Stats\PlayerScopeParam;
use JasonRoman\NbaApi\Params\Stats\SeasonTypeParam;
use JasonRoman\NbaApi\Params\Stats\SorterParam;
use JasonRoman\NbaApi\Params\Stats\StatCategoryParam;
use JasonRoman\NbaApi\Params\TeamIdParam;

class StatsStatsClientTest extends BaseClientTestCase
{
    const DEFAULT_PARAMS = [
        'seasonYear' => '2015-16',
        'seasonType' => SeasonTypeParam::REGULAR_SEASON,
        'gameScope' => GameScopeParam::SEASON,
        'playerScope' => PlayerScopeParam::ALL_PLAYERS,
        'playerOrTeam' => PlayerOrTeamParam::PLAYER,
        'statCategory' => StatCategoryParam::POINTS,
    ];

    const REQUEST_PARAMS = [
        'getAllStarBallotPredictor' => [
            'westPlayer1' => 201939,
            'westPlayer2' => 201566,
            'westPlayer3' => 202695,
            'westPlayer4' => 201142,
            'westPlayer5' => 201935,
            'eastPlayer1' => 2544,
            'eastPlayer2' => 201942,
            'eastPlayer3' => 202681,
            'eastPlayer4' => 202322,
            'eastPlayer5' => 203083,
        ],
        'getLeagueGameLog'          => [
            'playerOrTeam' => PlayerOrTeamParam::PLAYER_ABBREV,
            'counter'      => CounterParam::MIN_ALL,
            'sorter'       => SorterParam::POINTS,
            'direction'    => DirectionParam::ASC,
        ],
        'getGLeaguePredictor' => [
            'nbaTeamId' => TeamIdParam::DETROIT_PISTONS,
            'dLeagueTeamId' => TeamIdParam::GRAND_RAPIDS_DRIVE,
        ],
    ];

    /**
     * @var StatsStatsClient
     */
    protected $client;

    /**
     * {@inheritdoc}
     */
    protected function setUp()
    {
        $this->client = new StatsStatsClient();
    }

    /**
     * {@inheritdoc}
     */
    protected function getWhitelistedRequestMethods()
    {
        return ['getAllStarBallotPredictor'];
    }
}