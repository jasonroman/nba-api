<?php
declare(strict_types = 1);

namespace JasonRoman\NbaApi\Params\Stats;

class GameScopeParam extends AbstractStatsParam
{
    const FINALS    = 'Finals';
    const LAST_10   = 'Last 10';
    const SEASON    = 'Season';
    const YESTERDAY = 'Yesterday';

    const OPTIONS = [
        self::FINALS,
        self::LAST_10,
        self::SEASON,
        self::YESTERDAY,
    ];

    const OPTIONS_LAST_10_YESTERDAY = [
        self::LAST_10,
        self::YESTERDAY,
    ];
}