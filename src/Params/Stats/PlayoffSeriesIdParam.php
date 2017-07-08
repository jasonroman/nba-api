<?php

namespace JasonRoman\NbaApi\Params\Stats;

use JasonRoman\NbaApi\Params\SeasonParam;

class PlayoffSeriesIdParam extends SeasonParam
{
    // format is 004<YY><####>
    //  - 4 represents playoffs (1 is preseason, 2 is regular season, 4 is playoffs)
    //  - YY is the 2 digit year
    //  - ## is either:
    //      - for seasons >= 2001-02, use 00<R><S>, where R is round number 1-4, and S is series number 0-7
    //      - earlier seasons vary greatly; experiment and figure out for yourself
    const FORMAT = '/^\d{9}$/';
}