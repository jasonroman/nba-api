<?php

namespace JasonRoman\NbaApi\Request;

use JasonRoman\NbaApi\Response\ResponseType;

abstract class AbstractStatsProdRequest extends AbstractNbaApiRequest
{
    const REQUEST_TYPE = 'StatsProd';

    // default response type for most requests - override for non-JSON requests
    const RESPONSE_TYPE = ResponseType::JSON;
}