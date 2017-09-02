<?php

namespace JasonRoman\NbaApi\Request\Stats\Widgets\Homepage;

use JasonRoman\NbaApi\Request\Stats\Widgets\AbstractStatsWidgetsRequest;

/**
 * Get the homepage daily leaders.
 */
class HomepageDailyRequest extends AbstractStatsWidgetsRequest
{
    const ENDPOINT = '/js/data/widgets/home_daily.json';
}