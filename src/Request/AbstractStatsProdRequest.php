<?php

namespace JasonRoman\NbaApi\Request;

use JasonRoman\NbaApi\Client\AbstractStatsProdClient;
use JasonRoman\NbaApi\Response\ResponseType;

abstract class AbstractStatsProdRequest extends AbstractNbaApiRequest
{
    const BASE_URI = AbstractStatsProdClient::BASE_URI;
    const CLIENT   = AbstractStatsProdClient::class;

    // default response type for most requests - override for non-JSON requests
    const DEFAULT_RESPONSE_TYPE = ResponseType::JSON;
}