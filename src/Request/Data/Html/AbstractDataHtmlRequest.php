<?php

namespace JasonRoman\NbaApi\Request\Data\Html;

use JasonRoman\NbaApi\Client\Data\DataHtmlClient;
use JasonRoman\NbaApi\Request\Data\AbstractDataRequest;

/**
 * Base class which any Data\Html requests must extend from.
 */
abstract class AbstractDataHtmlRequest extends AbstractDataRequest
{
    const CLIENT = DataHtmlClient::class;
}