<?php

namespace JasonRoman\NbaApi\Request\Nba;

use JasonRoman\NbaApi\Request\AbstractUrlPlaceholderApiRequest;

abstract class AbstractNbaApiRequest extends AbstractUrlPlaceholderApiRequest
{
    const REQUEST_TYPE = 'Nba';

    /**
     * {@inheritdoc}
     */
    public function getRequestType() : string
    {
        return self::REQUEST_TYPE;
    }
}