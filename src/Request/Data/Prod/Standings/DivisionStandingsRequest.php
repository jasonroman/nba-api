<?php

namespace JasonRoman\NbaApi\Request\Data\Prod\Standings;

use JasonRoman\NbaApi\Request\Data\Prod\AbstractDataProdRequest;

/**
 * Get the league division standings.
 */
class DivisionStandingsRequest extends AbstractDataProdRequest
{
    const ENDPOINT = '/prod/v1/current/standings_division.json';
}