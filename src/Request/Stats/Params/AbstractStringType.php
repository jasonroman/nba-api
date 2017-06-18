<?php

namespace JasonRoman\NbaApi\Request\Stats\Params;

/**
 * Base String Type.
 */
class AbstractStringType extends AbstractType
{
    /**
     * @var string
     */
    public $value;

    /**
     * @param string $value
     */
    public function __construct(string $value)
    {
        parent::__construct($value);
    }
}