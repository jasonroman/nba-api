<?php

namespace JasonRoman\NbaApi\Request\Stats;

use JasonRoman\NbaApi\Client\Stats\AbstractStatsClient;
use JasonRoman\NbaApi\Request\AbstractNbaApiRequest;
use JasonRoman\NbaApi\Response\ResponseType;

abstract class AbstractStatsRequest extends AbstractNbaApiRequest
{
    const BASE_URI = 'http://stats.nba.com';

    const CONFIG = [
        'base_uri' => self::BASE_URI,
    ];

    /**
     * Note - it appears the following links are currently broken:
     *
     *  - /stats/leagueplayerondetails (always returns that error occurred)
     *  - /stats/playerdashboardbyshootingsplits (403 error)
     *  - /stats/playerdashptreboundlogs (404 error)
     *  - /stats/playerdashptshotlog (404 error)
     */
}