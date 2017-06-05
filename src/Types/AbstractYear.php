<?php

namespace JasonRoman\NbaApi\Types;

abstract class Year
{
    const FORMAT = '/^\d{4}$/';

    /**
     * @var string
     */
    public $value;
}