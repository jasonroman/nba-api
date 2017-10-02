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

        // filter out null values so the query string does not look like "1,2,..."
        return implode(',', array_filter($value));
    }
}