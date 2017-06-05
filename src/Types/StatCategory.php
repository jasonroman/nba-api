<?php

namespace JasonRoman\NbaApi\Types;

class StatCategory
{
    const FORMAT =
        '/^(Points)|(Rebounds)|(Assists)|(Defense)|(Clutch)'.
        '|(Playmaking)|(Efficiency)|(Fast Break)|(Scoring Breakdown)$/';

    const ASSISTS           = 'Assists';
    const CLUTCH            = 'Clutch';
    const DEFENSE           = 'Defense';
    const FAST_BREAK        = 'Fast Break';
    const EFFICIENCY        = 'Efficiency';
    const PLAYMAKING        = 'Playmaking';
    const POINTS            = 'Points';
    const REBOUNDS          = 'Rebounds';
    const SCORING_BREAKDOWN = 'Scoring Breakdown';

    /**
     * @var string
     */
    public $value;
}