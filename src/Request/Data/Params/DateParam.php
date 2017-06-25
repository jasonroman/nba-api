<?php

namespace JasonRoman\NbaApi\Request\Data\Params;

class DateParam extends AbstractDataParam
{
    // format for dates is YYYYMMDD
    const FORMAT = '/^\d{4}\d{2}\d{2}$/';

    /**
     * {@inheritdoc}
     * @return string
     */
    public function getDefaultValue()
    {
        return date('Ymd');
    }
}