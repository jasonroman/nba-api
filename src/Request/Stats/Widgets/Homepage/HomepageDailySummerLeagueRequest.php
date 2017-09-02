<?php

namespace JasonRoman\NbaApi\Request\Stats\Widgets\Homepage;

use JasonRoman\NbaApi\Request\Stats\Widgets\AbstractStatsWidgetsRequest;

/**
 * Get the homepage daily leaders for summer league.
 */
class HomepageDailySummerLeagueRequest extends AbstractStatsWidgetsRequest
{
    const ENDPOINT = '/js/data/widgets/home_daily_summerleague.json';
}