<?php

namespace JasonRoman\NbaApi\Request\Data\Params;

use JasonRoman\NbaApi\Request\Params\SeasonParam;

class YearParam extends SeasonParam
{
    const FORMAT = '/^\d{4}$/';

    /**
     * @return string
     */
    public function getDefaultValue()
    {
        return SeasonParam::currentSeasonStartYear();
    }
}