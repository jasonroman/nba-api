<?php

namespace JasonRoman\NbaApi\Request\Data\Prod\Standings;

use JasonRoman\NbaApi\Request\AbstractDataRequest;

/**
 * Get the league conference standings.
 */
class ConferenceStandingsRequest extends AbstractDataRequest
{
    const ENDPOINT = '/prod/v1/current/standings_conference.json';
}