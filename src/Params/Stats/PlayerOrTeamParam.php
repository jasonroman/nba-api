<?php declare(strict_types = 1);

namespace JasonRoman\NbaApi\Params\Stats;

class PlayerOrTeamParam extends AbstractStatsParam
{
    const PLAYER = 'Player';
    const TEAM   = 'Team';

    const PLAYER_ABBREV = 'P';
    const TEAM_ABBREV   = 'T';

    const OPTIONS = [
        self::PLAYER,
        self::TEAM,
    ];

    const OPTIONS_ABBREV = [
        self::PLAYER_ABBREV,
        self::TEAM_ABBREV,
    ];
}