<?php

namespace JasonRoman\NbaApi\Request\Stats\Stats;

use JasonRoman\NbaApi\Client\Stats\StatsStatsClient;
use JasonRoman\NbaApi\Request\Stats\AbstractStatsRequest;

abstract class AbstractStatsStatsRequest extends AbstractStatsRequest
{
    const CLIENT = StatsStatsClient::class;
}