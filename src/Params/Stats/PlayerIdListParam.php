<?php

namespace JasonRoman\NbaApi\Params\Stats;

class PlayerIdListParam extends AbstractStatsParam
{
    /**
     * Convert an array of player ids to a comma-separated list.
     *
     * {@inheritdoc}
     */
    public static function getStringValue($value): string
    {
        if (!is_array($value)) {
            return '';
        }

        return implode(',', $value);
    }
}