<?php

namespace JasonRoman\NbaApi\Request\Stats\Widgets\Stats;

use JasonRoman\NbaApi\Request\Stats\Data\AbstractStatsDataRequest;

/**
 * Get the player hustle leaders stats.
 */
class HustleLeadersRequest extends AbstractStatsDataRequest
{
    const ENDPOINT = '/js/data/widgets/hustle_leaders.json';
}