<?php declare(strict_types = 1);

namespace JasonRoman\NbaApi\Params\Stats;

class IsOnlyCurrentSeasonParam extends AbstractStatsParam
{
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

    /**
     * {@inheritdoc}
     * @return int
     */
    public static function getDefaultValue(): bool
    {
        return true;
    }
}