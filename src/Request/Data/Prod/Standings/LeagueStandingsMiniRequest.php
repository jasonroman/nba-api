<?php

namespace JasonRoman\NbaApi\Request\Data\Prod\Standings;

use JasonRoman\NbaApi\Request\Data\Prod\AbstractDataProdRequest;

/**
 * Get the league mini-standings. This is the same as the ungrouped standings, just with no sort keys.
 */
class LeagueStandingsMiniRequest extends AbstractDataProdRequest
{
    const ENDPOINT = '/prod/v1/current/standings_all_no_sort_keys.json';
}