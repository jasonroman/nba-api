<?php

namespace JasonRoman\NbaApi\Request\StatsProd;

use JasonRoman\NbaApi\Client\StatsProd\AbstractStatsProdClient;
use JasonRoman\NbaApi\Request\AbstractNbaApiRequest;
use JasonRoman\NbaApi\Response\ResponseType;

abstract class AbstractStatsProdRequest extends AbstractNbaApiRequest
{
    const BASE_URI = 'http://stats-prod.nba.com';

    const HEADERS = [
        'Origin' => 'http://stats-prod.nba.com',
        'Host'   => 'stats-prod.nba.com',
    ];

    const CONFIG = [
        'base_uri' => self::BASE_URI,
    ];
}