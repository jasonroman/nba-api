<?php
declare(strict_types = 1);

namespace JasonRoman\NbaApi\Params\Stats;

abstract class AbstractYesNoParam extends AbstractStatsParam
{
    const YES = 'Y';
    const NO  = 'N';

    /**
     * {@inheritdoc}
     */
    public static function getStringValue($value): string
    {
        return ($value) ? self::YES : self::NO;
    }
}