<?php

namespace JasonRoman\NbaApi\Request\Stats\Widgets\Homepage;

use JasonRoman\NbaApi\Request\Stats\Data\AbstractStatsDataRequest;

/**
 * Get the homepage playoff leaders.
 */
class HomepagePlayoffsRequest extends AbstractStatsDataRequest
{
    const ENDPOINT = '/js/data/widgets/home_playoffs.json';
}