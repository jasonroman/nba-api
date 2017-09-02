<?php declare(strict_types = 1);

namespace JasonRoman\NbaApi\Params\Stats;

/**
 * Country. Does not appear to be case-sensitive.
 * @todo possibly maintain a more full list later
 */
class CountryParam extends AbstractStatsParam
{
    const UNITED_STATES = 'USA';
}