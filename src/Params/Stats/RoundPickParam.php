<?php declare(strict_types = 1);

namespace JasonRoman\NbaApi\Params\Stats;

/**
 * Draft pick number of a particular round.
 */
class RoundPickParam extends AbstractStatsParam
{
    const MIN = 1;
    const MAX = 30;
}