<?php

namespace JasonRoman\NbaApi\Request\Stats\Widgets\Homepage;

use JasonRoman\NbaApi\Request\AbstractStatsRequest;

/**
 * Get the homepage daily leaders.
 */
class HomepageDailyRequest extends AbstractStatsRequest
{
    const ENDPOINT = '/js/data/widgets/home_daily.json';
}