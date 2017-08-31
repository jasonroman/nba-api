<?php

namespace JasonRoman\NbaApi\Request;

use JasonRoman\NbaApi\Client\AbstractGLeagueClient;
use JasonRoman\NbaApi\Response\ResponseType;

abstract class AbstractGLeagueRequest extends AbstractNbaApiRequest
{
    const BASE_URI = AbstractGLeagueClient::BASE_URI;
    const CLIENT   = AbstractGLeagueClient::class;

    // default response type for most requests - override for non-JSON requests
    const DEFAULT_RESPONSE_TYPE = ResponseType::JSON;
}