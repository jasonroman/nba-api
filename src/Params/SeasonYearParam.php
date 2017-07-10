<?php

namespace JasonRoman\NbaApi\Params;

class SeasonYearParam extends SeasonParam
{
    const FORMAT = '/^\d{4}$/';

    const FIRST_SEASON_YEAR       = 1946;
    const FIRST_DRAFT_SEASON_YEAR = 1947;
    const SYNERGY_FIRST_YEAR      = 2015;

    /**
     * {@inheritdoc}
     * @return int
     */
    public static function getDefaultValue() : int
    {
        return SeasonParam::currentSeasonStartYear();
    }
}