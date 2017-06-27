<?php

namespace JasonRoman\NbaApi\Params\Data;

use JasonRoman\NbaApi\Request\Params\SeasonParam;

class PlayoffSeriesIdParam extends SeasonParam
{
    // standard allowed options;
    // first digit is playoff round number from 1-4, second digit is playoff series number from 0-7 (zero-indexed)
    const OPTIONS = [
        10,
        11,
        12,
        13,
        14,
        15,
        16,
        17,
        20,
        21,
        22,
        23,
        30,
        31,
        40
    ];
}