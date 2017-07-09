<?php
declare(strict_types = 1);

namespace JasonRoman\NbaApi\Params\Stats;

/**
 * Get the month.
 * @todo perform more research on assist tracker or other endpoints to make sure 0 means all.
 */
class MonthParam extends AbstractStatsParam
{
    // some endpoints require this, but '0' indicates all months; why not just make it not required? who knows...
    const MIN_ALL = 0;

    const MIN = 1;
    const MAX = 12;
}