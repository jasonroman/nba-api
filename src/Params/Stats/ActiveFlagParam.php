<?php
declare(strict_types = 1);

namespace JasonRoman\NbaApi\Params\Stats;

/**
 * Active flag determines whether to only display active players.
 */
class ActiveFlagParam extends AbstractStatsParam
{
    /**
     * {@inheritdoc}
     */
    public static function getStringValue($value) : string
    {
        return ((bool) $value) ? 'Yes' : 'No';
    }
}