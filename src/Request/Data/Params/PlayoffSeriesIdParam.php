<?php

namespace JasonRoman\NbaApi\Request\Data\Params;

use JasonRoman\NbaApi\Request\Params\SeasonParam;

class PlayoffSeriesIdParam extends SeasonParam
{
    // first digit is playoff round number, second digit is playoff series number (zero-indexed)
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