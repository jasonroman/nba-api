<?php

namespace JasonRoman\NbaApi\Request\Stats\Widgets\Homepage;

use JasonRoman\NbaApi\Request\Stats\Widgets\AbstractStatsWidgetsRequest;

/**
 * Get the homepage editorial information/news.
 */
class HomepageEditorialRequest extends AbstractStatsWidgetsRequest
{
    const ENDPOINT = '/js/data/widgets/home_editorial.json';
}