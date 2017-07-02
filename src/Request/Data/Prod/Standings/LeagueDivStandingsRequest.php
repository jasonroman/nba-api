<?php

namespace JasonRoman\NbaApi\Request\Data\Prod\Standings;

use JasonRoman\NbaApi\Request\AbstractDataRequest;

/**
 * Get the league division standings.
 */
class LeagueDivStandingsRequest extends AbstractDataRequest
{
    const ENDPOINT = '/data/prod/v1/current/standings_division.json';
}