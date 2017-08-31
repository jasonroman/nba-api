<?php

namespace JasonRoman\NbaApi\Request\Nba;

use JasonRoman\NbaApi\Client\Nba\AbstractNbaClient;
use JasonRoman\NbaApi\Request\AbstractNbaApiRequest;
use JasonRoman\NbaApi\Response\ResponseType;

/**
 * Base class which any Nba requests must extend from.
 */
abstract class AbstractNbaRequest extends AbstractNbaApiRequest
{
    const BASE_URI = AbstractNbaClient::BASE_URI;

    // default response type for most requests - override for non-XML requests
    const DEFAULT_RESPONSE_TYPE = ResponseType::XML;
}