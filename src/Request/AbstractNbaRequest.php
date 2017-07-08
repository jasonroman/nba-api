<?php

namespace JasonRoman\NbaApi\Request;

use JasonRoman\NbaApi\Response\ResponseType;

abstract class AbstractNbaRequest extends AbstractNbaApiRequest
{
    const REQUEST_TYPE = 'Nba';

    // default response type for most requests - override for non-XML requests
    const RESPONSE_TYPE = ResponseType::XML;
}