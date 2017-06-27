<?php

namespace JasonRoman\NbaApi\Request\Data\Standings;

use JasonRoman\NbaApi\Request\Data\AbstractDataApiRequest;

/**
 * Get the full, ungrouped league standings. This also contains sort keys.
 */
class LeagueUngroupedStandingsRequest extends AbstractDataApiRequest
{
    const ENDPOINT = '/data/10s/prod/v1/current/standings_all.json';
}