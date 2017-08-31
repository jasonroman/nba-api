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
    const BASE_URI = AbstractDataClient::BASE_URI;

    // default response type for most requests - override for non-JSON requests
    const DEFAULT_RESPONSE_TYPE = ResponseType::JSON;
}