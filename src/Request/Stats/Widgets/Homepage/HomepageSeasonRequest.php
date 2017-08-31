<?php

namespace JasonRoman\NbaApi\Request\Stats\Widgets\Homepage;

use JasonRoman\NbaApi\Request\Stats\Data\AbstractStatsDataRequest;

/**
 * Get the homepage regular season leaders.
 */
class HomepageSeasonRequest extends AbstractStatsDataRequest
{
    const ENDPOINT = '/js/data/widgets/home_season.json';
}