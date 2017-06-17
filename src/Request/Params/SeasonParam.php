<?php
declare(strict_types = 1);

namespace JasonRoman\NbaApi\Request\Params;

class SeasonParam extends AbstractParam
{
    /**
     * Get the current season in format YYYY-YY based on the year.
     *
     * @param string|int $year
     * @return string
     */
    public static function fromYear($year) : string
    {
        if (preg_match(self::YEAR_FORMAT, $year) !== 1) {
            throw new \InvalidArgumentException(sprintf('Year must be in %s format', self::FORMAT));
        }

        return $year.'-'.substr($year + 1, -2);
    }

    /**
     * Get the current season in format YYYY-YY.
     *
     * @return string
     */
    public static function currentSeason() : string
    {
        // if August or earlier, the season started from the previous year
        return self::fromYear(self::currentSeasonStartYear());
    }

    /**
     * Get the current season's year in format YYYY.
     *
     * @return string
     */
    public static function currentSeasonStartYear() : string
    {
        // if August or earlier, the season started from the previous year
        return (date('n') < 9) ? (string) (date('Y') - 1) : date('Y');
    }
}