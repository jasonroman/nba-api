<?php

namespace JasonRoman\NbaApi\Request\Data\Prod\General;

use JasonRoman\NbaApi\Request\AbstractDataRequest;

/**
 * Get all provided URL endpoints for the current day.
 */
class TodayRequest extends AbstractDataRequest
{
    const ENDPOINT = '/prod/v3/today.json';
}