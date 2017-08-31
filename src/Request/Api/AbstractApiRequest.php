<?php

namespace JasonRoman\NbaApi\Request\Api;

use JasonRoman\NbaApi\Client\Api\AbstractApiClient;
use JasonRoman\NbaApi\Request\AbstractNbaApiRequest;
use JasonRoman\NbaApi\Response\ResponseType;

/**
 * Base class which any Api requests must extend from (from api.nba.net)
 */
abstract class AbstractApiRequest extends AbstractNbaApiRequest
{
    const BASE_URI = AbstractApiClient::BASE_URI;

    // default response type for most requests - override for non-JSON requests
    const DEFAULT_RESPONSE_TYPE = ResponseType::JSON;
}