<?php

namespace JasonRoman\NbaApi\Request\Stats\Widgets\Players;

use JasonRoman\NbaApi\Request\Stats\Data\AbstractStatsDataRequest;

/**
 * Get the players inner page sidebar. This contains several statistical categories and the top 5 players in each.
 */
class PlayersLandingInnerRequest extends AbstractStatsDataRequest
{
    const ENDPOINT = '/js/data/widgets/players_landing_inner.json';
}