<?php declare(strict_types = 1);

namespace JasonRoman\NbaApi\Params;

class SeasonIdParam extends AbstractParam
{
    const FORMAT = '/^\d{1}\d{4}$/';

    // assuming all-star is 3, @todo should confirm sometime
    const PREFIX_PRESEASON      = 1;
    const PREFIX_REGULAR_SEASON = 2;
    const PREFIX_ALL_STAR       = 3;
    const PREFIX_PLAYOFFS       = 4;

    const PREFIXES = [
        self::PREFIX_PRESEASON,
        self::PREFIX_REGULAR_SEASON,
        self::PREFIX_ALL_STAR,
        self::PREFIX_PLAYOFFS,
    ];

    /**
     * Get the current season in format YYYY-YY based on the year.
     *
     * @param int $year
     * @param int $prefix
     * @return string
     */
    public static function fromYearAndPrefix(int $year, int $prefix): string
    {
        if (!in_array($prefix, self::PREFIXES)) {
            throw new \InvalidArgumentException('Season ID prefix is invalid');
        }

        return (string) $prefix.(string) $year;
    }

    /**
     * Get the current season id in format <prefix>YYYY.
     *
     * @param int $prefix
     * @return string
     */
    public static function currentSeasonId(int $prefix): string
    {
        return self::fromYearAndPrefix(SeasonParam::currentSeasonStartYear(), $prefix);
    }
}