<?php

namespace JasonRoman\NbaApi\Request\Stats\Widgets\Homepage;

use JasonRoman\NbaApi\Request\AbstractStatsRequest;

/**
 * Get the homepage playoff leaders.
 */
class HomepagePlayoffsRequest extends AbstractStatsRequest
{
    const ENDPOINT = '/js/data/widgets/home_playoffs.json';
}