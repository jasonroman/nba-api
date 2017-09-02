<?php declare(strict_types = 1);

namespace JasonRoman\NbaApi\Params\Stats;

/**
 * Shot distance range. It supports any comparison and then a range in feet that must be a valid number.
 * There may be any number of spaces after the comparison symbol(s), which will be ignored.
 * It appears that != and <> are accepted for 'not equals' but do not change the default results (possibly due to
 * that being such a specific value that 99.9% of the data is also not equal; as if there were no filter at all).
 *
 * Examples:
 *  >10
 *  <= 5.5
 *  >
 * =   2.5
 * <>2.3
 * != 20.0
 */
class ShotDistanceRangeParam extends AbstractStatsParam
{
    const FORMAT = '/^(>|>=|<|<=|=|!=|<>)( *)\d+(\.?\d+)?$/';
}