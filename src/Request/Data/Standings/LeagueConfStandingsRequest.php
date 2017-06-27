<?php

namespace JasonRoman\NbaApi\Request\Data\Standings;

use JasonRoman\NbaApi\Request\Data\AbstractDataApiRequest;

/**
 * Get the league conference standings.
 */
class LeagueConfStandingsRequest extends AbstractDataApiRequest
{
    const ENDPOINT = '/data/10s/prod/v1/current/standings_conference.json';
}