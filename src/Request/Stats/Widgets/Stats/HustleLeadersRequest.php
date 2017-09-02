<?php

namespace JasonRoman\NbaApi\Request\Stats\Widgets\Stats;

use JasonRoman\NbaApi\Request\Stats\Widgets\AbstractStatsWidgetsRequest;

/**
 * Get the player hustle leaders stats.
 */
class HustleLeadersRequest extends AbstractStatsWidgetsRequest
{
    const ENDPOINT = '/js/data/widgets/hustle_leaders.json';
}