<?php

namespace JasonRoman\NbaApi\Request\Stats\Widgets\Stats;

use JasonRoman\NbaApi\Request\Stats\Widgets\AbstractStatsWidgetsRequest;

/**
 * Get the player advanced leaders stats. It contains several statistical categories and the top 10 players in each.
 */
class AdvancedLeadersRequest extends AbstractStatsWidgetsRequest
{
    const ENDPOINT = '/js/data/widgets/advanced_leaders.json';
}