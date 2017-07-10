<?php

namespace JasonRoman\NbaApi\Request\Stats\Widges\Stats;

use JasonRoman\NbaApi\Request\AbstractStatsRequest;

/**
 * Get the player advanced leaders stats. It contains several statistical categories and the top 10 players in each.
 */
class AdvancedLeadersRequest extends AbstractStatsRequest
{
    const ENDPOINT = '/js/data/widgets/advanced_leaders.json';
}