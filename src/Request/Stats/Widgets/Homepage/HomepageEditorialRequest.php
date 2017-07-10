<?php

namespace JasonRoman\NbaApi\Request\Stats\Widgets\Homepage;

use JasonRoman\NbaApi\Request\AbstractStatsRequest;

/**
 * Get the homepage editorial information/news.
 */
class HomepageEditorialRequest extends AbstractStatsRequest
{
    const ENDPOINT = '/js/data/widgets/home_editorial.json';
}