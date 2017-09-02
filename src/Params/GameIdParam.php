<?php

namespace JasonRoman\NbaApi\Params;

class GameIdParam extends AbstractParam
{
    const FORMAT = '/^\d{10}$/';

    /**
     * {@inheritdoc}
     */
    public static function getExampleValue()
    {
        // 2017-02-01 Toronto @ Boston Regular Season
        return '0021600732';
    }
}