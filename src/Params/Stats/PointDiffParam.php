<?php
declare(strict_types = 1);

namespace JasonRoman\NbaApi\Params\Stats;

/**
 * Point Differential - use 0 for all. Point differential is X or less, not the exact amount.
 */
class PointDiffParam extends AbstractStatsParam
{
    const MIN_ALL = 0;

    const MIN = 1;
    const MAX = 14;
}