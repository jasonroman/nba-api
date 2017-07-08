<?php

namespace JasonRoman\NbaApi\Request;

use JasonRoman\NbaApi\Response\ResponseType;

/**
 * Base class which any Data API-specific requests must extend from.
 */
abstract class AbstractDataRequest extends AbstractNbaApiRequest
{
    const REQUEST_TYPE  = 'Data';

    // default response type for most requests - override for non-JSON requests
    const RESPONSE_TYPE = ResponseType::JSON;
}