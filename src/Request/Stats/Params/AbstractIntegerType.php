<?php

namespace JasonRoman\NbaApi\Request\Stats\Params;

/**
 * Base Integer Type.
 */
class AbstractIntegerType extends AbstractType
{
    /**
     * @var int
     */
    public $value;

    /**
     * @param int $value
     */
    public function __construct(int $value)
    {
        parent::__construct($value);
    }
}