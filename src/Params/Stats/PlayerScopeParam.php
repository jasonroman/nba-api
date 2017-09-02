<?php declare(strict_types = 1);

namespace JasonRoman\NbaApi\Params\Stats;

class PlayerScopeParam extends AbstractStatsParam
{
    const ALL_PLAYERS = 'All Players';
    const ROOKIES     = 'Rookies';

    const OPTIONS = [
        self::ALL_PLAYERS,
        self::ROOKIES,
    ];
}