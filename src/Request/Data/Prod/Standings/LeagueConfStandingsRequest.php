<?php

namespace JasonRoman\NbaApi\Request\Data\Prod\Standings;

use JasonRoman\NbaApi\Request\AbstractDataRequest;

/**
 * Get the league conference standings.
 */
class LeagueConfStandingsRequest extends AbstractDataRequest
{
    const ENDPOINT = '/data/prod/v1/current/standings_conference.json';
}