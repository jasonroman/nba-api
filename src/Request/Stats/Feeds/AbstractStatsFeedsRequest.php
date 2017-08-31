<?php

namespace JasonRoman\NbaApi\Request\Stats\Feeds;

use JasonRoman\NbaApi\Client\Stats\StatsFeedsClient;
use JasonRoman\NbaApi\Request\Stats\AbstractStatsRequest;

abstract class AbstractStatsFeedsRequest extends AbstractStatsRequest
{
    const CLIENT = StatsFeedsClient::class;
}