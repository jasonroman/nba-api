<?php
declare(strict_types = 1);

namespace JasonRoman\NbaApi\Params\Stats;

class LocationParam extends AbstractStatsParam
{
    const HOME = 'Home';
    const ROAD = 'Road';

    const OPTIONS = [
        self::HOME,
        self::ROAD,
    ];
}