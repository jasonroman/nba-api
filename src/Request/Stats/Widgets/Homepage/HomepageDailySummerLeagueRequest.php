<?php

namespace JasonRoman\NbaApi\Request\Stats\Widgets\Homepage;

use JasonRoman\NbaApi\Request\AbstractStatsRequest;

/**
 * Get the homepage daily leaders for summer league.
 */
class HomepageDailySummerLeagueRequest extends AbstractStatsRequest
{
    const ENDPOINT = '/js/data/widgets/home_daily_summerleague.json';
}