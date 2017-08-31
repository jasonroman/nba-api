<?php

namespace JasonRoman\NbaApi\Request\Stats\Widgets\Homepage;

use JasonRoman\NbaApi\Request\Stats\Data\AbstractStatsDataRequest;

/**
 * Get the homepage editorial information/news.
 */
class HomepageEditorialRequest extends AbstractStatsDataRequest
{
    const ENDPOINT = '/js/data/widgets/home_editorial.json';
}