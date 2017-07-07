<?php

namespace JasonRoman\NbaApi\Params\Data;

class SummerLeagueAbbrevParam extends AbstractParam
{
    const ORLANDO = 'SL_O';
    const UTAH    = 'SL_U';
    const VEGAS   = 'SL_V';

    const OPTIONS = [
        self::ORLANDO,
        self::UTAH,
        self::VEGAS,
    ];
}