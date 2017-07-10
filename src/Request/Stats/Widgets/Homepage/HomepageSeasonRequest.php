<?php

namespace JasonRoman\NbaApi\Request\Stats\Widges\Players;

use JasonRoman\NbaApi\Request\AbstractStatsRequest;

/**
 * Get the homepage regular season leaders.
 */
class HomepageSeasonRequest extends AbstractStatsRequest
{
    const ENDPOINT = '/js/data/widgets/home_season.json';
}