<?php
declare(strict_types = 1);

namespace JasonRoman\NbaApi\Params\Stats;

class DivisionParam extends AbstractStatsParam
{
    const ATLANTIC  = 'Atlantic';
    const CENTRAL   = 'Central';
    const EAST      = 'East';
    const NORTHWEST = 'Northwest';
    const PACIFIC   = 'Pacific';
    const SOUTHEAST = 'Southeast';
    const SOUTHWEST = 'Southwest';
    const WEST      = 'West';

    const OPTIONS = [
        self::ATLANTIC,
        self::CENTRAL,
        self::NORTHWEST,
        self::PACIFIC,
        self::SOUTHEAST,
        self::SOUTHWEST,
    ];

    const OPTIONS_WITH_CONFERENCE = [
        self::ATLANTIC,
        self::CENTRAL,
        self::EAST,
        self::NORTHWEST,
        self::PACIFIC,
        self::SOUTHEAST,
        self::SOUTHWEST,
        self::WEST,
    ];
}