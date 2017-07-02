<?php

namespace JasonRoman\NbaApi\Request\Data\Prod\Schedule;

use JasonRoman\NbaApi\Request\AbstractDataRequest;

/**
 * Get the number of games per day since 2015, as well as the season start date.
 */
class CalendarRequest extends AbstractDataRequest
{
    const ENDPOINT = '/data/prod/v2/calendar.json';
}