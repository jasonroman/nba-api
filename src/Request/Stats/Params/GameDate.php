<?php

namespace JasonRoman\NbaApi\Request\Stats\Params;

class GameDate
{
    public function getDefaultValue()
    {
        return date('Y-m-d');
    }
}