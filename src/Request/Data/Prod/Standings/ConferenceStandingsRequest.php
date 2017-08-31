<?php

namespace JasonRoman\NbaApi\Request\Data\Prod\Standings;

use JasonRoman\NbaApi\Request\Data\Prod\AbstractDataProdRequest;

/**
 * Get the league conference standings.
 */
class ConferenceStandingsRequest extends AbstractDataProdRequest
{
    const ENDPOINT = '/prod/v1/current/standings_conference.json';
}