<?php

namespace JasonRoman\NbaApi\Tests\Integration\Client;

use JasonRoman\NbaApi\Client\StatsStatsClient;
use JasonRoman\NbaApi\Params\Stats\ContextMeasureParam;
use JasonRoman\NbaApi\Params\Stats\CounterParam;
use JasonRoman\NbaApi\Params\Stats\DirectionParam;
use JasonRoman\NbaApi\Params\Stats\EndPeriodParam;
use JasonRoman\NbaApi\Params\Stats\GameScopeParam;
use JasonRoman\NbaApi\Params\Stats\PeriodParam;
use JasonRoman\NbaApi\Params\Stats\PerModeParam;
use JasonRoman\NbaApi\Params\Stats\PlayerOrTeamParam;
use JasonRoman\NbaApi\Params\Stats\PlayerScopeParam;
use JasonRoman\NbaApi\Params\Stats\PtMeasureTypeParam;
use JasonRoman\NbaApi\Params\Stats\SeasonTypeParam;
use JasonRoman\NbaApi\Params\Stats\SorterParam;
use JasonRoman\NbaApi\Params\Stats\StartPeriodParam;
use JasonRoman\NbaApi\Params\Stats\StatCategoryParam;
use JasonRoman\NbaApi\Params\Stats\StatParam;
use JasonRoman\NbaApi\Params\Stats\StatTypeParam;
use JasonRoman\NbaApi\Params\TeamIdParam;

class StatsStatsClientTest extends BaseClientTestCase
{
    const DEFAULT_PARAMS = [
        'season'         => '2015-16',
        'seasonYear'     => '2015-16',
        'seasonType'     => SeasonTypeParam::REGULAR_SEASON,
        'seasonId'       => 22015,
        'gameScope'      => GameScopeParam::SEASON,
        'playerScope'    => PlayerScopeParam::ALL_PLAYERS,
        'playerOrTeam'   => PlayerOrTeamParam::PLAYER,
        'statCategory'   => StatCategoryParam::POINTS,
        'statType'       => StatTypeParam::TRADITIONAL,
        'stat'           => StatParam::POINTS,
        'perMode'        => PerModeParam::TOTALS,
        'opponentTeamId' => TeamIdParam::MIN_ALL,
        'gameScope'      => GameScopeParam::LAST_10,
        'plusMinus'      => false,
        'paceAdjust'     => false,
        'rank'           => false,
        'contextMeasure' => ContextMeasureParam::POINTS,
    ];

    const REQUEST_PARAMS = [
        'getAllStarBallotPredictor'    => [
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
        'getDraftHistory'              => [
            'season' => 2016,
        ],
        'getLeagueGameLog'             => [
            'playerOrTeam' => PlayerOrTeamParam::PLAYER_ABBREV,
            'counter'      => CounterParam::MIN_ALL,
            'sorter'       => SorterParam::POINTS,
            'direction'    => DirectionParam::ASC,
        ],
        'getGLeaguePredictor'          => [
            'nbaTeamId'     => TeamIdParam::DETROIT_PISTONS,
            'dLeagueTeamId' => TeamIdParam::GRAND_RAPIDS_DRIVE,
        ],
        'getLeagueLeaders'             => [
            'statCategory' => StatParam::POINTS,
        ],
        'getPlayerCompareStats'        => [
            'playerIdList'   => [2544, 201939],
            'vsPlayerIdList' => [201566],
        ],
        'getPlayerShotChartDetail'     => [
            'startPeriod' => StartPeriodParam::MIN_ALT,
            'endPeriod'   => EndPeriodParam::MAX_ALT,
        ],
        'getPlayerVsPlayer'            => [
            'vsPlayerId' => 2544,
        ],
        'getPlayersTrackingStats'      => [
            'ptMeasureType' => PtMeasureTypeParam::REBOUNDING,
        ],
        'getPlayersVsPlayers'          => [
            'playerTeamId' => TeamIdParam::GOLDEN_STATE_WARRIORS,
            'playerId1'    => 201939,
            'vsTeamId'     => TeamIdParam::CLEVELAND_CAVALIERS,
            'vsPlayerId1'  => 2544,
        ],
        'getDefenseHub'                => [
            'gameScope' => GameScopeParam::SEASON,
        ],
        'getTeamShotChartLineupDetail' => [
            'group_id' => '0',
        ],
        'getTeamVsPlayer'              => [
            'vsPlayerId' => 2544,
        ],
        'getVideoEvents'               => [
            'gameEventId' => 1,
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