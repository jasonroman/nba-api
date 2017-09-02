<?php

namespace JasonRoman\NbaApi\Params;

class YearParam extends AbstractParam
{
    const FORMAT = '/^\d{4}$/';

    /**
     * {@inheritdoc}
     * @return int
     */
    public static function getDefaultValue(): int
    {
        return SeasonParam::currentSeasonStartYear();
    }

    /**
     * {@inheritdoc}
     */
    public static function getExampleValue()
    {
        return 2016;
    }
}