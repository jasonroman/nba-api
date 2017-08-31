<?php

namespace JasonRoman\NbaApi\Request\Data\Cms\General;

use JasonRoman\NbaApi\Request\Data\Cms\AbstractDataCmsRequest;

/**
 * Not sure what this provides other than season meta information.
 */
class TodayRequest extends AbstractDataCmsRequest
{
    const ENDPOINT = '/json/cms/today.json';
}