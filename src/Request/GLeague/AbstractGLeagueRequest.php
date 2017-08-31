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
    const BASE_URI = AbstractGLeagueClient::BASE_URI;

    // default response type for most requests - override for non-JSON requests
    const DEFAULT_RESPONSE_TYPE = ResponseType::JSON;
}