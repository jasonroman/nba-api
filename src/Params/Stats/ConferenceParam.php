<?php declare(strict_types = 1);

namespace JasonRoman\NbaApi\Params\Stats;

class ConferenceParam extends AbstractStatsParam
{
    const EAST = 'East';
    const WEST = 'West';

    const OPTIONS = [
        self::EAST,
        self::WEST,
    ];
}