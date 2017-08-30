<?php

namespace JasonRoman\NbaApi\Request\Data\Cms\General;

use JasonRoman\NbaApi\Request\AbstractDataRequest;

/**
 * Not sure what this provides other than season meta information.
 */
class TodayRequest extends AbstractDataRequest
{
    const ENDPOINT = '/json/cms/today.json';
}