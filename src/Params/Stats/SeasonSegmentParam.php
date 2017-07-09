<?php
declare(strict_types = 1);

namespace JasonRoman\NbaApi\Params\Stats;

class SeasonSegmentParam extends AbstractStatsParam
{
    const PRE_ALL_STAR  = 'Pre All-Star';
    const POST_ALL_STAR = 'Post All-Star';

    const OPTIONS = [
        self::PRE_ALL_STAR,
        self::POST_ALL_STAR,
    ];
}