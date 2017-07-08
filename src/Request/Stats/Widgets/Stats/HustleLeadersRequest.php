<?php

namespace JasonRoman\NbaApi\Request\Stats\Widges\Stats;

use JasonRoman\NbaApi\Request\AbstractStatsRequest;

/**
 * Get the player hustle leaders stats.
 */
class HustleLeadersRequest extends AbstractStatsRequest
{
    const ENDPOINT = '/js/data/widgets/hustle_leaders.json';
}