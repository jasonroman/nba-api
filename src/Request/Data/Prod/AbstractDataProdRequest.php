<?php

namespace JasonRoman\NbaApi\Request\Data\Prod;

use JasonRoman\NbaApi\Client\Data\DataProdClient;
use JasonRoman\NbaApi\Request\Data\AbstractDataRequest;

/**
 * Base class which any Data\Prod requests must extend from.
 */
abstract class AbstractDataProdRequest extends AbstractDataRequest
{
    const CLIENT = DataProdClient::class;
}