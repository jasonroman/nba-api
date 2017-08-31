<?php

namespace JasonRoman\NbaApi\Request\Stats;

use JasonRoman\NbaApi\Client\Stats\AbstractStatsClient;
use JasonRoman\NbaApi\Request\AbstractNbaApiRequest;
use JasonRoman\NbaApi\Response\ResponseType;

abstract class AbstractStatsRequest extends AbstractNbaApiRequest
{
    const BASE_URI = AbstractStatsClient::BASE_URI;

    // default response type for most requests - override for non-JSON requests
    const DEFAULT_RESPONSE_TYPE = ResponseType::JSON;

    /**
     * Note - it appears the following links are currently broken:
     *
     *  - /stats/leagueplayerondetails (always returns that error occurred)
     *  - /stats/playerdashboardbyshootingsplits (403 error)
     *  - /stats/playerdashptreboundlogs (404 error)
     *  - /stats/playerdashptshotlog (404 error)
     */
}