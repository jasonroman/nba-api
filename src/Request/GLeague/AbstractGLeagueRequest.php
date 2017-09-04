<?php

namespace JasonRoman\NbaApi\Request\GLeague;

use JasonRoman\NbaApi\Client\GLeague\AbstractGLeagueClient;
use JasonRoman\NbaApi\Request\AbstractNbaApiRequest;
use JasonRoman\NbaApi\Response\ResponseType;

/**
 * Base class which any GLeague requests must extend from.
 */
abstract class AbstractGLeagueRequest extends AbstractNbaApiRequest
{
    const PROTOCOL    = 'http://';
    const BASE_DOMAIN = 'gleague.nba.com';
    const BASE_URI    = self::PROTOCOL.self::BASE_DOMAIN;

    const HEADERS = [
        'Origin' => 'http://gleague.nba.com',
        'Host'   => 'gleague.nba.com',
    ];

    const CONFIG = [
        'base_uri' => self::BASE_URI,
    ];
}