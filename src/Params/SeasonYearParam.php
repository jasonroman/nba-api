<?php

namespace JasonRoman\NbaApi\Params;

class SeasonYearParam
{
    const FORMAT = '/^\d{4}$/';

    const FIRST_SEASON_YEAR       = 1946;
    const FIRST_DRAFT_SEASON_YEAR = 1947;
    const SPORTVU_FIRST_YEAR      = 2013;
    const SPORTVU_LAST_YEAR       = 2015;
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