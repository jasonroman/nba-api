<?php

namespace JasonRoman\NbaApi\Request\Stats\Widges\Players;

use JasonRoman\NbaApi\Request\AbstractStatsRequest;

/**
 * Get the players inner page sidebar. This contains several statistical categories and the top 5 players in each.
 */
class PlayersLandingInnerRequest extends AbstractStatsRequest
{
    const ENDPOINT = '/js/data/widgets/players_landing_inner.json';
}