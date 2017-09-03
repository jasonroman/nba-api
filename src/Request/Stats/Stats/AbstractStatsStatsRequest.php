<?php

namespace JasonRoman\NbaApi\Request\Stats\Stats;

use JasonRoman\NbaApi\Client\Stats\StatsStatsClient;
use JasonRoman\NbaApi\Params\Stats\ContextMeasureParam;
use JasonRoman\NbaApi\Params\Stats\GameScopeParam;
use JasonRoman\NbaApi\Params\Stats\PlayerOrTeamParam;
use JasonRoman\NbaApi\Params\Stats\PlayerScopeParam;
use JasonRoman\NbaApi\Params\Stats\ShotRangeParam;
use JasonRoman\NbaApi\Params\Stats\StatCategoryParam;
use JasonRoman\NbaApi\Params\Stats\StatParam;
use JasonRoman\NbaApi\Params\Stats\StatTypeParam;
use JasonRoman\NbaApi\Request\Stats\AbstractStatsRequest;

abstract class AbstractStatsStatsRequest extends AbstractStatsRequest
{
    const CLIENT = StatsStatsClient::class;

    /**
     * {@inheritdoc}
     */
    public function getDefaultValues(): array
    {
        return array_merge(parent::getDefaultValues(), [
            'dayOffset'    => 0,
            'generalRange' => ShotRangeParam::OVERALL,
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function getExampleValues(): array
    {
        return array_merge(parent::getExampleValues(), [
            'season'         => '2015-16',
            'seasonYear'     => '2015-16',
            'seasonId'       => 22015,
            'gameScope'      => GameScopeParam::SEASON,
            'playerScope'    => PlayerScopeParam::ALL_PLAYERS,
            'playerOrTeam'   => PlayerOrTeamParam::PLAYER,
            'statCategory'   => StatCategoryParam::POINTS,
            'statType'       => StatTypeParam::TRADITIONAL,
            'stat'           => StatParam::POINTS,
            'gameScope'      => GameScopeParam::LAST_10,
            'contextMeasure' => ContextMeasureParam::POINTS,
        ]);
    }
}