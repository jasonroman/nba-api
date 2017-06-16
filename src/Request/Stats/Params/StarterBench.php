<?php

namespace JasonRoman\NbaApi\Request\Stats\Params;

class StarterBench
{
    const FORMAT ='/^((Starters)|(Bench))?$/';

    const STARTER = 'Starters';
    const BENCH   = 'Bench';

    /**
     * @var string
     */
    public $value;
}