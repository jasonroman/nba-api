<?php

namespace JasonRoman\NbaApi\Request\Data\Prod\Standings;

use JasonRoman\NbaApi\Request\Data\Prod\AbstractDataProdRequest;

/**
 * Get the full, ungrouped league standings. This also contains sort keys.
 */
class LeagueStandingsRequest extends AbstractDataProdRequest
{
    const ENDPOINT = '/prod/v1/current/standings_all.json';
}