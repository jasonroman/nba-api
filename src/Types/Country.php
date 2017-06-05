<?php

namespace JasonRoman\NbaApi\Types;

class Country
{
    const UNITED_STATES = 'USA';

    /**
     * Country does not appear to be case-sensitive.
     * United States is 'USA'.
     *
     * @var string
     */
    public $value;
}