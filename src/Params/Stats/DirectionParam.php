<?php declare(strict_types = 1);

namespace JasonRoman\NbaApi\Params\Stats;

class DirectionParam extends AbstractStatsParam
{
    const ASC  = 'ASC';
    const DESC = 'DESC';

    const OPTIONS = [
        self::ASC,
        self::DESC,
    ];
}