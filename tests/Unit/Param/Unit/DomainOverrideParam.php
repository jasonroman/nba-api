<?php

namespace JasonRoman\NbaApi\Tests\Unit\Param\Unit;

use JasonRoman\NbaApi\Tests\Unit\Param\AbstractUnitParam;

class DomainOverrideParam extends AbstractUnitParam
{
    const DEFAULT = 'domain_default_override';
    const EXAMPLE = 'domain_example_override';

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