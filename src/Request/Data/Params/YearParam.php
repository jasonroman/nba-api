<?php

namespace JasonRoman\NbaApi\Request\Data\Params;

use JasonRoman\NbaApi\Request\Params\SeasonParam;

class YearParam extends SeasonParam
{
    /**
     * @return string
     */
    public function getDefaultValue()
    {
        return SeasonParam::currentSeasonStartYear();
    }
}