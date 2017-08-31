<?php

namespace JasonRoman\NbaApi\Request\Api\League;

use JasonRoman\NbaApi\Client\Api\ApiLeagueClient;
use JasonRoman\NbaApi\Request\Api\AbstractApiRequest;

/**
 * Base class which any Api\League requests must extend from.
 */
abstract class AbstractApiLeagueRequest extends AbstractApiRequest
{
    const CLIENT = ApiLeagueClient::class;
}