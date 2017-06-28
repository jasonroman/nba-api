<?php

namespace JasonRoman\NbaApi\Request\Data\Schedule;

use JasonRoman\NbaApi\Request\Data\AbstractDataApiRequest;

/**
 * Get the number of games per day since 2015, as well as the season start date.
 */
class CalendarRequest extends AbstractDataApiRequest
{
    const ENDPOINT = '/data/prod/v1/calendar.json';
}