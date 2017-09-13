<?php

namespace JasonRoman\NbaApi\Tests\Unit\Params\Fixtures\Unit;

use JasonRoman\NbaApi\Tests\Unit\Params\Fixtures\AbstractUnitParam;

class DomainOverrideParam extends AbstractUnitParam
{
    const DEFAULT = 'domain_default_override';
    const EXAMPLE = 'domain_example_override';

    /**
     * @param mixed $value
     * @return string
     */
    public static function getStringValue($value): string
    {
        return (string) $value .'_and_some_domain_extra';
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