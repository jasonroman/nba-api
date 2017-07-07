<?php

namespace JasonRoman\NbaApi\Request\Data\Prod\Standings;

use JasonRoman\NbaApi\Request\AbstractDataRequest;

/**
 * Get the league mini-standings. This is the same as the ungrouped standings, just with no sort keys.
 */
class LeagueStandingsMiniRequest extends AbstractDataRequest
{
    const ENDPOINT = '/data/prod/v1/current/standings_all_no_sort_keys.json';
}