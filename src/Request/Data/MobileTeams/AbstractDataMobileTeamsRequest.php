<?php

namespace JasonRoman\NbaApi\Request\Data\MobileTeams;

use JasonRoman\NbaApi\Client\Data\DataMobileTeamsClient;
use JasonRoman\NbaApi\Request\Data\AbstractDataRequest;

/**
 * Base class which any Data\MobileTeams requests must extend from.
 */
abstract class AbstractDataMobileTeamsRequest extends AbstractDataRequest
{
    const CLIENT = DataMobileTeamsClient::class;
}