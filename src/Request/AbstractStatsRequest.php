<?php

namespace JasonRoman\NbaApi\Request;

use JasonRoman\NbaApi\Response\ResponseType;

abstract class AbstractStatsRequest extends AbstractNbaApiRequest
{
    const REQUEST_TYPE = 'Stats';

    // default response type for most requests - override for non-JSON requests
    const RESPONSE_TYPE = ResponseType::JSON;

    /**
     * Note - it appears the following links are currently broken:
     *
     *  - /stats/leagueplayerondetails (always returns that error occurred)
     *  - /stats/playerdashboardbyshootingsplits (403 error)
     *  - /stats/playerdashptreboundlogs (404 error)
     *  - /stats/playerdashptshotlog (404 error)
     */
}