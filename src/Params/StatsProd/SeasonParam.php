<?php declare(strict_types = 1);

namespace JasonRoman\NbaApi\Params\StatsProd;

use JasonRoman\NbaApi\Params\SeasonParam as BaseSeasonParam;
use JasonRoman\NbaApi\Params\SeasonYearParam;

class SeasonParam extends SeasonYearParam
{
    /**
     * {@inheritdoc}
     * @return int
     */
    public static function getDefaultValue(): int
    {
        return BaseSeasonParam::currentSeasonStartYear();
    }
}