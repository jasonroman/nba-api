<?php declare(strict_types = 1);

namespace JasonRoman\NbaApi\Params\Stats;

abstract class AbstractYesParam extends AbstractStatsParam
{
    const YES = 'YES';

    /**
     * Returns a true/false as the string 'Y' or 'N'.
     *
     * {@inheritdoc}
     */
    public static function getStringValue($value): string
    {
        return ($value) ? self::YES : '';
    }
}