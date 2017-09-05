<?php

namespace JasonRoman\NbaApi\Request\Nba;

use JasonRoman\NbaApi\Request\AbstractNbaApiRequest;
use JasonRoman\NbaApi\Response\ResponseType;

/**
 * Base class which any Nba requests must extend from.
 */
abstract class AbstractNbaRequest extends AbstractNbaApiRequest
{
    const BASE_URI = 'http://www.nba.com';

    const DEFAULT_RESPONSE_TYPE = ResponseType::XML;

    const HEADERS = [
        'Origin' => 'http://www.nba.com',
        'Host'   => 'www.nba.com',
    ];

    const CONFIG = [
        'base_uri' => self::BASE_URI,
    ];
}