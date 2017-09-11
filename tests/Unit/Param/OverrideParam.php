<?php

namespace JasonRoman\NbaApi\Tests\Unit\Param;

class OverrideParam extends AbstractUnitParam
{
    const DEFAULT = 'base_default_override';
    const EXAMPLE = 'base_example_override';

    /**
     * {@inheritdoc}
     * @return string
     */
    public static function getDefaultValue(): string
    {
        return self::DEFAULT;
    }

    /**
     * {@inheritdoc}
     * @return string
     */
    public static function getExampleValue(): string
    {
        return self::EXAMPLE;
    }
}