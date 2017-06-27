<?php

namespace JasonRoman\NbaApi\Request\Data;

/**
 * Get all provided URL endpoints for the current day.
 */
class TodayRequest extends AbstractDataApiRequest
{
    const ENDPOINT = '/data/10s/prod/v1/today.json';
}