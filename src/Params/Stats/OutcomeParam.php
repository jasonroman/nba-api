<?php declare(strict_types = 1);

namespace JasonRoman\NbaApi\Params\Stats;

class OutcomeParam extends AbstractStatsParam
{
    const WIN  = 'W';
    const LOSS = 'L';

    const OPTIONS = [
        self::WIN,
        self::LOSS,
    ];
}