<?php

namespace JasonRoman\NbaApi\Request\Data\Params;

class DateParam
{
    public function getDefaultValue()
    {
        return date('Ymd');
    }
}