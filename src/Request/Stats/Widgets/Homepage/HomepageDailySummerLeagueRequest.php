<?php

namespace JasonRoman\NbaApi\Request\Stats\Widgets\Homepage;

use JasonRoman\NbaApi\Request\Stats\Data\AbstractStatsDataRequest;

/**
 * Get the homepage daily leaders for summer league.
 */
class HomepageDailySummerLeagueRequest extends AbstractStatsDataRequest
{
    const ENDPOINT = '/js/data/widgets/home_daily_summerleague.json';
}