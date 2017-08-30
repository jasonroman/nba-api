<?php

namespace JasonRoman\NbaApi\Request;

use JasonRoman\NbaApi\Response\ResponseType;

abstract class AbstractNbaRequest extends AbstractNbaApiRequest
{
    // default response type for most requests - override for non-XML requests
    const DEFAULT_RESPONSE_TYPE = ResponseType::XML;
}