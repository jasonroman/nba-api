<?php

namespace JasonRoman\NbaApi\Request;

use JasonRoman\NbaApi\Response\ResponseType;

abstract class AbstractGLeagueRequest extends AbstractNbaApiRequest
{
    const REQUEST_TYPE = 'GLeague';

    // default response type for most requests - override for non-JSON requests
    const RESPONSE_TYPE = ResponseType::JSON;
}