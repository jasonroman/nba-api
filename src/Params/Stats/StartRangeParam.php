<?php
declare(strict_types = 1);

namespace JasonRoman\NbaApi\Params\Stats;

/**
 * Range is value in tenths of a second elapsed in a game.
 */
class StartRangeParam extends AbstractStatsParam
{
    const MIN = 0;
    const MAX = 2147483647;

    /**
     * {@inheritdoc}
     * @return int
     */
    public static function getDefaultValue() : int
    {
        return self::MIN;
    }
}