<?php
declare(strict_types = 1);

namespace JasonRoman\NbaApi\Params\Stats;

/**
 * Playoff Round.
 */
class PORoundParam extends AbstractStatsParam
{
    const MIN_ALL = 0;

    const MIN = 1;
    const MAX = 4;

    // only 4 playoff rounds, but treated as integer and this is maximum allowed value
    const MAX_VALUE = 2147483647;
}