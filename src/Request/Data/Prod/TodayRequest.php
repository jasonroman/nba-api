<?php

namespace JasonRoman\NbaApi\Request\Data\Prod;

/**
 * Get all provided URL endpoints for the current day.
 */
class TodayRequest extends AbstractDataRequest
{
    const ENDPOINT = '/data/prod/v3/today.json';
}