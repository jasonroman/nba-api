<?php

namespace JasonRoman\NbaApi\Request\Data\Prod\Standings;

use JasonRoman\NbaApi\Request\AbstractDataRequest;

/**
 * Get the full, ungrouped league standings. This also contains sort keys.
 */
class LeagueStandingsRequest extends AbstractDataRequest
{
    const ENDPOINT = '/prod/v1/current/standings_all.json';
}