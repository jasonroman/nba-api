<?php

namespace JasonRoman\NbaApi\Types;

abstract class AbstractBoolean
{
    /**
     * Value between 0 and 1.
     *
     * @var int
     */
    public $value;

    /**
     * @param mixed $value
     * @return $this
     */
    public function setValue($value)
    {
        $this->value = (int) (bool) $value;

        return $this;
    }
}