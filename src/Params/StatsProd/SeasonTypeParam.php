<?php
declare(strict_types = 1);

namespace JasonRoman\NbaApi\Params\StatsProd;

class SeasonTypeParam extends AbstractStatsProdParam
{
    const REGULAR_SEASON = 'Reg';
    const PLAYOFFS       = 'Post';

    const OPTIONS = [
        self::REGULAR_SEASON,
        self::PLAYOFFS,
    ];

    /**
     * {@inheritdoc}
     * @return int
     */
    public static function getDefaultValue() : string
    {
        return self::REGULAR_SEASON;
    }
}