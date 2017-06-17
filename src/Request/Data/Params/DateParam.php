<?php

namespace JasonRoman\NbaApi\Request\Data\Params;

class DateParam extends AbstractDataParam
{
    public function getDefaultValue()
    {
        return date('Ymd');
    }
}