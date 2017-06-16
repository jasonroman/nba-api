<?php

namespace JasonRoman\NbaApi\Request\Stats\Params;

class Outcome
{
    const FORMAT = '/^((W)|(L))?$/';

    const WIN  = 'W';
    const LOSS = 'L';

    /**
     * @var string
     */
    public $value;
}