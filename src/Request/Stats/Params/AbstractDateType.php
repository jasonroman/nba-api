<?php
declare(strict_types = 1);

namespace JasonRoman\NbaApi\Request\Stats\Params;

abstract class AbstractDateType extends AbstractType
{
    /**
     * @var \DateTime|string if string, format is YYYY-MM-DD
     */
    public $value;

    /**
     * @param \DateTime $value
     */
    public function __construct(\DateTime $value)
    {
        parent::__construct($value);
    }

    /**
     * @return string
     */
    public function __toString() : string
    {
        return $this->value->format('Y-m-d');
    }
}