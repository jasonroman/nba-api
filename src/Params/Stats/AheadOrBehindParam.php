<?php
declare(strict_types = 1);

namespace JasonRoman\NbaApi\Params\Stats;

class AheadOrBehindParam extends AbstractStatsParam
{
    const AHEAD_OR_BEHIND = 'Ahead or Behind';
    const BEHIND_OR_TIED  = 'Behind or Tied';
    const AHEAD_OR_TIED   = 'Ahead or Tied';

    const OPTIONS = [
        self::AHEAD_OR_BEHIND,
        self::BEHIND_OR_TIED,
        self::AHEAD_OR_TIED,
    ];
}