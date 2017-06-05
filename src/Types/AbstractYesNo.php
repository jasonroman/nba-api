<?php

namespace JasonRoman\NbaApi\Types;

abstract class AbstractYesNo
{
    const FORMAT = '/^(Y)|(N)$/';

    const YES = 'Y';
    const NO  = 'N';

    /**
     * @var string
     */
    public $value;
}