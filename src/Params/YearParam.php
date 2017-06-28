<?php

namespace JasonRoman\NbaApi\Params;

class YearParam extends SeasonParam
{
    const FORMAT = '/^\d{4}$/';

    /**
     * {@inheritdoc}
     * @return int
     */
    public static function getDefaultValue() : int
    {
        return SeasonParam::currentSeasonStartYear();
    }
}