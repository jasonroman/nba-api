<?php declare(strict_types = 1);

namespace JasonRoman\NbaApi\Params\Stats;

/**
 * Overall draft pick. The 239th pick comes from the 1970 draft, which was Mark Gabriel, who never played an NBA game.
 */
class OverallPickParam extends AbstractStatsParam
{
    const MIN = 1;
    const MAX = 239;
}