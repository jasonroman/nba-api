<?php

namespace JasonRoman\NbaApi\Request\Stats;

use JasonRoman\NbaApi\Request\AbstractQueryParamApiRequest;

abstract class AbstractStatsApiRequest extends AbstractQueryParamApiRequest
{
    const REQUEST_TYPE = 'Stats';

    /**
     * {@inheritdoc}
     */
    public function getRequestType() : string
    {
        return self::REQUEST_TYPE;
    }
}