<?php

namespace JasonRoman\NbaApi\Request\Stats\Params;

abstract class Year
{
    const FORMAT = '/^\d{4}$/';

    /**
     * @var string
     */
    public $value;
}