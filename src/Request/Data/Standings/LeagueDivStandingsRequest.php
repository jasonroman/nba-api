<?php

namespace JasonRoman\NbaApi\Request\Data\Standings;

use JasonRoman\NbaApi\Request\Data\AbstractDataApiRequest;

/**
 * Get the league division standings.
 */
class LeagueDivStandingsRequest extends AbstractDataApiRequest
{
    const ENDPOINT = '/data/prod/v1/current/standings_division.json';
}