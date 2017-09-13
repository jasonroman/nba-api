<?php

namespace JasonRoman\NbaApi\Tests\Unit\Params\Fixtures;

class OverrideParam extends AbstractUnitParam
{
    const DEFAULT = 'base_default_override';
    const EXAMPLE = 'base_example_override';

    /**
     * @param mixed $value
     * @return string
     */
    public static function getStringValue($value): string
    {
        return (string) $value .'_and_some_extra';
    }

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