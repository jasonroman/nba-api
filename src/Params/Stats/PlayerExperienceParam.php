<?php
declare(strict_types = 1);

namespace JasonRoman\NbaApi\Params\Stats;

class PlayerExperienceParam extends AbstractStatsParam
{
    const ROOKIE    = 'Rookie';
    const SOPHOMORE = 'Sophomore';
    const VETERAN   = 'Veteran';

    const OPTIONS = [
        self::ROOKIE,
        self::SOPHOMORE,
        self::VETERAN,
    ];
}