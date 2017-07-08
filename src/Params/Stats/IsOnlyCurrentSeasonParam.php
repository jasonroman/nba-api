<?php
declare(strict_types = 1);

namespace JasonRoman\NbaApi\Params\Stats;

class IsOnlyCurrentSeasonParam extends AbstractStatsParam
{
    /**
     * {@inheritdoc}
     * @return int
     */
    public static function getDefaultValue() : bool
    {
        return true;
    }

    /**
     * Convert the boolean value to string.
     *
     * @param bool $value
     * @return string
     */
    public static function getStringValue($value): string
    {
        return (string) (int) $value;
    }
}