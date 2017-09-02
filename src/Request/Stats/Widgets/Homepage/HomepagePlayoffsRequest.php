<?php

namespace JasonRoman\NbaApi\Request\Stats\Widgets\Homepage;

use JasonRoman\NbaApi\Request\Stats\Widgets\AbstractStatsWidgetsRequest;

/**
 * Get the homepage playoff leaders.
 */
class HomepagePlayoffsRequest extends AbstractStatsWidgetsRequest
{
    const ENDPOINT = '/js/data/widgets/home_playoffs.json';
}