<?php declare(strict_types = 1);

namespace JasonRoman\NbaApi\Params\Stats;

class NumberOfGamesParam extends AbstractStatsParam
{
    const MIN = 1;
    const MAX = 2147483647;

    // this might apply elsewhere; but found this on the fantasy stats page, so being more restrictive until more known
    const DEFAULT_FANTASY_NEXT_N_GAMES = 4;

    /**
     * {@inheritdoc}
     * @return int
     */
    public static function getDefaultValue(): int
    {
        return self::DEFAULT_FANTASY_NEXT_N_GAMES;
    }
}