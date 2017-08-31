<?php

namespace JasonRoman\NbaApi\Request\Data\Prod\General;

use JasonRoman\NbaApi\Request\Data\Prod\AbstractDataProdRequest;

/**
 * Get all provided URL endpoints for the current day.
 */
class TodayRequest extends AbstractDataProdRequest
{
    const ENDPOINT = '/prod/v3/today.json';
}