<?php declare(strict_types = 1);

namespace JasonRoman\NbaApi\Params\Stats;

class StatTypeParam extends AbstractStatsParam
{
    const ADVANCED    = 'Advanced';
    const TRACKING    = 'Tracking';
    const TRADITIONAL = 'Traditional';

    const OPTIONS = [
        self::ADVANCED,
        self::TRACKING,
        self::TRADITIONAL,
    ];
}