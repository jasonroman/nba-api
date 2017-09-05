<?php declare(strict_types = 1);

namespace JasonRoman\NbaApi\Params\Stats;

/**
 * Active flag determines whether to display only active players.
 */
class ActiveFlagParam extends AbstractStatsParam
{
    const YES = 'Yes';
    const NO  = 'No';

    /**
     * {@inheritdoc}
     */
    public static function getStringValue($value): string
    {
        return ($value) ? self::YES : self::NO;
    }
}