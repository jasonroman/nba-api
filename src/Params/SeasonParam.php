<?php declare(strict_types = 1);

namespace JasonRoman\NbaApi\Params;

class SeasonParam extends AbstractParam
{
    const FORMAT                   = '/^\d{4}-\d{2}$/';
    const FORMAT_WITH_ALL          = '/^(\d{4}-\d{2})|(ALL)$/';
    const FORMAT_WITH_ALL_TIME     = '/^(\d{4}-\d{2})|(All Time)$/';
    const FORMAT_WITH_ALL_TIME_ALT = '/^(\d{4}-\d{2})|(ALLTIME)$/';

    /**
     * Get the current season in format YYYY-YY based on the year.
     *
     * @param int $year
     * @return string
     * @throws \InvalidArgumentException
     */
    public static function fromYear(int $year): string
    {
        if (preg_match(SeasonYearParam::FORMAT, (string) $year) !== 1) {
            throw new \InvalidArgumentException(sprintf('Year must be in %s format', self::FORMAT));
        }

        return $year.'-'.substr((string) ($year + 1), -2);
    }

    /**
     * Get the current season in format YYYY-YY.
     *
     * @return string
     */
    public static function currentSeason(): string
    {
        // if August or earlier, the season started from the previous year
        return self::fromYear(self::currentSeasonStartYear());
    }

    /**
     * Get the current season's year in format YYYY.
     *
     * @return int
     */
    public static function currentSeasonStartYear(): int
    {
        // if September or earlier, the season started from the previous year
        // NBA has a gap, where it considered a season ending on the last day of the NBA finals
        // but the season start is October 1st; might want to handle this more specifically in the future
        return (date('n') < 10) ?  (int) (date('Y') - 1) : (int) date('Y');
    }

    /**
     * {@inheritdoc}
     * @return string
     */
    public static function getDefaultValue(): string
    {
        return self::currentSeason();
    }
}