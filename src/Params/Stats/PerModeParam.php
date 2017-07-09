<?php
declare(strict_types = 1);

namespace JasonRoman\NbaApi\Params\Stats;

class PerModeParam extends AbstractStatsParam
{
    const MINUTES_PER         = 'MinutesPer';
    const PER_36              = 'Per36';
    const PER_40              = 'Per40';
    const PER_48              = 'Per48';
    const PER_100_PLAYS       = 'Per100Plays';
    const PER_100_POSSESSIONS = 'Per100Possessions';
    const PER_GAME            = 'PerGame';
    const PER_MINUTE          = 'PerMinute';
    const PER_PLAY            = 'PerPlay';
    const PER_POSSESSION      = 'PerPossession';
    const TOTALS              = 'Totals';

    const OPTIONS_TOTALS_PER_GAME = [
        self::PER_GAME,
        self::TOTALS,
    ];

    const OPTIONS_TOTALS_PER_GAME_PER_48 = [
        self::PER_48,
        self::PER_GAME,
        self::TOTALS,
    ];

    const OPTIONS_TOTALS_PER_GAME_PER_36 = [
        self::PER_36,
        self::PER_GAME,
        self::TOTALS,
    ];
}