<?php

namespace JasonRoman\NbaApi\Request;

use JasonRoman\NbaApi\Client\AbstractNbaClient;
use JasonRoman\NbaApi\Response\ResponseType;

abstract class AbstractNbaRequest extends AbstractNbaApiRequest
{
    const BASE_URI = AbstractNbaClient::BASE_URI;
    const CLIENT   = AbstractNbaClient::class;

    // default response type for most requests - override for non-XML requests
    const DEFAULT_RESPONSE_TYPE = ResponseType::XML;
}