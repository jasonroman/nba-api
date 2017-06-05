<?php

namespace JasonRoman\NbaApi\Types;

class MeasureType
{
    const FORMAT = '/^(Base)|(Advanced)|(Misc)|(Four Factors)|(Scoring)|(Opponent)|(Usage)|(Defense)$/';

    const ADVANCED     = 'Advanced';
    const BASE         = 'Base';
    const DEFENSE      = 'Defense';
    const FOUR_FACTORS = 'Four Factors';
    const MISC         = 'Misc';
    const OPPONENT     = 'Opponent';
    const SCORING      = 'Scoring';
    const USAGE        = 'Usage';

    /**
     * @var string
     */
    public $value;
}