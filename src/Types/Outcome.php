<?php

namespace JasonRoman\NbaApi\Types;

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