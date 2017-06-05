<?php

namespace JasonRoman\NbaApi\Types;

class TopX
{
    /**
     * Top X picks in the draft. Cannot select Top X in a specific round - so range is the same as overall pick.
     * Value between 1 and 239.
     *
     * @var int
     */
    public $value;
}