<?php declare(strict_types = 1);

namespace JasonRoman\NbaApi\Params\Stats;

class StarterBenchParam extends AbstractStatsParam
{
    const BENCH    = 'Bench';
    const STARTERS = 'Starters';

    const OPTIONS = [
        self::BENCH,
        self::STARTERS,
    ];
}