<?php
declare(strict_types = 1);

namespace JasonRoman\NbaApi\Params\Stats;

class PlayerOrTeamParam extends AbstractStatsParam
{
    const PLAYER = 'Player';
    const TEAM   = 'Team';

    const OPTIONS = [
        self::PLAYER,
        self::TEAM,
    ];
}