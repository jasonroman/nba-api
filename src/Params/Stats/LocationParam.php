<?php
declare(strict_types = 1);

namespace JasonRoman\NbaApi\Params\Stats;

class LocationParam extends AbstractStatsParam
{
    const HOME = 'Home';
    const ROAD = 'Road';

    // this may not be valid - check it across requests
    const AWAY = 'Away';

    const OPTIONS = [
        self::HOME,
        self::ROAD,
    ];

    const OPTIONS_HOME_AWAY = [
        self::HOME,
        self::AWAY,
    ];
}