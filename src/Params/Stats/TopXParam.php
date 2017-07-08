<?php
declare(strict_types = 1);

namespace JasonRoman\NbaApi\Params\Stats;

/**
 * Top X picks in the draft. Cannot select Top X in a specific round - so range is the same as OverallPick.
 */
class TopXParam extends AbstractStatsParam
{
    const MIN = 1;
    const MAX = 239;
}