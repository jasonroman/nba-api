<?php

namespace JasonRoman\NbaApi\Request\StatsProd;

use JasonRoman\NbaApi\Client\StatsProd\AbstractStatsProdClient;
use JasonRoman\NbaApi\Request\AbstractNbaApiRequest;
use JasonRoman\NbaApi\Response\ResponseType;

abstract class AbstractStatsProdRequest extends AbstractNbaApiRequest
{
    const BASE_URI = AbstractStatsProdClient::BASE_URI;

    // default response type for most requests - override for non-JSON requests
    const DEFAULT_RESPONSE_TYPE = ResponseType::JSON;
}