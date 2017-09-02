<?php declare(strict_types = 1);

namespace JasonRoman\NbaApi\Params\Stats;

class DribbleRangeParam extends AbstractStatsParam
{
    const DRIBBLES_0      = '0 Dribbles';
    const DRIBBLES_1      = '1 Dribble';
    const DRIBBLES_2      = '2 Dribbles';
    const DRIBBLES_3_TO_6 = '3-6 Dribbles';
    const DRIBBLES_7_PLUS = '7+ Dribbles';

    const OPTIONS = [
        self::DRIBBLES_0,
        self::DRIBBLES_1,
        self::DRIBBLES_2,
        self::DRIBBLES_3_TO_6,
        self::DRIBBLES_7_PLUS,
    ];
}