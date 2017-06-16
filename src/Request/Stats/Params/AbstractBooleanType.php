<?php

namespace JasonRoman\NbaApi\Request\Stats\Params;

abstract class AbstractBooleanType
{
    /**
     * @var bool
     */
    public $value;

    /**
     * @param bool $value
     */
    public function __construct(bool $value)
    {
        parent::__construct($value);
    }

    /**
     * @return string
     */
    public function __toString()
    {
        return (string) (int) $this->value;
    }
}