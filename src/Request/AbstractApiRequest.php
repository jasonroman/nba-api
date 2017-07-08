<?php

namespace JasonRoman\NbaApi\Request;

use JasonRoman\NbaApi\Response\ResponseType;

/**
 * Base class which any API-specific requests must extend from (from api.nba.net)
 */
abstract class AbstractApiRequest extends AbstractNbaApiRequest
{
    const REQUEST_TYPE  = 'Api';

    // default response type for most requests - override for non-JSON requests
    const RESPONSE_TYPE = ResponseType::JSON;
}