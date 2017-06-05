<?php

namespace JasonRoman\NbaApi\Types;

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