<?php

namespace JasonRoman\NbaApi\Request\Nba\Wsc;

use JasonRoman\NbaApi\Client\Nba\NbaWscClient;
use JasonRoman\NbaApi\Request\Nba\AbstractNbaRequest;

/**
 * Base class which any Nba\Wsc requests must extend from.
 */
abstract class AbstractNbaWscRequest extends AbstractNbaRequest
{
    const CLIENT = NbaWscClient::class;
}