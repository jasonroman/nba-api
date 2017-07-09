<?php
declare(strict_types = 1);

namespace JasonRoman\NbaApi\Params\Stats;

/**
 * Point Differential. Value is X points or less, not the exact point differential.
 */
class PointDiffParam extends AbstractStatsParam
{
    const MIN = 1;
    const MAX = 5;
}