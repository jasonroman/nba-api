<?php

namespace JasonRoman\NbaApi\Request\Stats\Widgets\Homepage;

use JasonRoman\NbaApi\Request\AbstractStatsRequest;

/**
 * Get the homepage regular season leaders.
 */
class HomepageSeasonRequest extends AbstractStatsRequest
{
    const ENDPOINT = '/js/data/widgets/home_season.json';
}