<?php

namespace JasonRoman\NbaApi\Request\Stats\Widgets;

use JasonRoman\NbaApi\Client\Stats\StatsWidgetsClient;
use JasonRoman\NbaApi\Request\Stats\AbstractStatsRequest;

abstract class AbstractStatsWidgetsRequest extends AbstractStatsRequest
{
    const CLIENT = StatsWidgetsClient::class;
}