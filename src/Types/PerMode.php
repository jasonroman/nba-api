<?php

namespace JasonRoman\NbaApi\Types;

class PerMode
{
    const FORMAT =
        '/^'.
        '(Totals)|(PerGame)|(MinutesPer)|(Per48)|(Per40)|(Per36)'.
        '|(PerMinute)|(PerPossession)|(PerPlay)|(Per100Possessions)|(Per100Plays)'.
        '$/';

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

    /**
     * @var string
     */
    public $value;
}