<?php

namespace JasonRoman\NbaApi\Request\Data\Bios;

use JasonRoman\NbaApi\Client\Data\DataBiosClient;
use JasonRoman\NbaApi\Request\Data\AbstractDataRequest;

/**
 * Base class which any Data\Bios requests must extend from.
 */
abstract class AbstractDataBiosRequest extends AbstractDataRequest
{
    const CLIENT = DataBiosClient::class;
}