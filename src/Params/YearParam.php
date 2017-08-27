<?php

namespace JasonRoman\NbaApi\Params;

class YearParam
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