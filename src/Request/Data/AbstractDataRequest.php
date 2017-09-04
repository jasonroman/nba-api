<?php

namespace JasonRoman\NbaApi\Request\Data;

use JasonRoman\NbaApi\Client\Data\AbstractDataClient;
use JasonRoman\NbaApi\Request\AbstractNbaApiRequest;
use JasonRoman\NbaApi\Response\ResponseType;

/**
 * Base class which any Data requests must extend from.
 */
abstract class AbstractDataRequest extends AbstractNbaApiRequest
{
    // it appears data.nba.com can also be used
    const BASE_URI = 'http://data.nba.net';

    const HEADERS = [
        'Origin' => 'http://data.nba.net',
        'Host'   => 'data.nba.net',
    ];

    const CONFIG = [
        'base_uri' => self::BASE_URI,
    ];
}