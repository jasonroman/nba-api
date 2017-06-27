<?php

namespace JasonRoman\NbaApi\Request\Data\Standings;

use JasonRoman\NbaApi\Request\Data\AbstractDataApiRequest;

/**
 * Get the league mini-standings. This is the same as the ungrouped standings, just with no sort keys.
 */
class LeagueMiniStandingsRequest extends AbstractDataApiRequest
{
    const ENDPOINT = '/data/10s/prod/v1/current/standings_all_no_sort_keys.json';
}