<?php

namespace JasonRoman\NbaApi\Request\Stats\Data\Players;

use JasonRoman\NbaApi\Request\Stats\Data\AbstractStatsDataRequest;

class PlayerMovementRequest extends AbstractStatsDataRequest
{
    const ENDPOINT = '/js/data/playermovement/NBA_Player_Movement.json';
}