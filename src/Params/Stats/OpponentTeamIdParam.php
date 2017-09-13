<?php

namespace JasonRoman\NbaApi\Params\Stats;

use JasonRoman\NbaApi\Params\TeamIdParam;

class OpponentTeamIdParam extends TeamIdParam
{
    const LABEL = 'Opponent Team ID';

    /**
     * {@inheritdoc}
     * @return int
     */
    public static function getDefaultValue(): int
    {
        return self::MIN_ALL;
    }

    /**
     * {@inheritdoc}
     * @return int
     */
    public static function getExampleValue(): int
    {
        return self::MIN_ALL;
    }
}