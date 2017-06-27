<?php

namespace JasonRoman\NbaApi\Request\Data;

use JasonRoman\NbaApi\Request\AbstractUrlPlaceholderApiRequest;

/**
 * Base class which any Data API-specific requests must extend from.
 */
abstract class AbstractDataApiRequest extends AbstractUrlPlaceholderApiRequest
{
    const REQUEST_TYPE = 'Data';

    /**
     * {@inheritdoc}
     */
    public function getRequestType() : string
    {
        return self::REQUEST_TYPE;
    }
}