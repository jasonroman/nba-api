<?php

namespace JasonRoman\NbaApi\Request\Data\Params;

use JasonRoman\NbaApi\Request\Stats\Params\Season;

class YearParam
{
    public function getDefaultValue()
    {
        return Season::currentSeasonStartYear();
    }
}