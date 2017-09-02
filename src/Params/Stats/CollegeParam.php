<?php declare(strict_types = 1);

namespace JasonRoman\NbaApi\Params\Stats;

/**
 * College - appears to be case-sensitive. In the future, possibly populate with NBA's drop-down; but since this
 * would change every season, and would contain a lot of values, set this aside for a rainy day.
 */
class CollegeParam extends AbstractStatsParam
{
    const HIGH_SCHOOL = 'High School';
    const NONE        = 'None';
}