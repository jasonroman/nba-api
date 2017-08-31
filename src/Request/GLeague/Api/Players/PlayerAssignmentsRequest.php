<?php

namespace JasonRoman\NbaApi\Request\GLeague\Api\Players;

use JasonRoman\NbaApi\Request\GLeague\Api\AbstractGLeagueApiRequest;

class PlayerAssignmentsRequest extends AbstractGLeagueApiRequest
{
    const ENDPOINT = '/wp-json/api/v1/assignments.json';
}