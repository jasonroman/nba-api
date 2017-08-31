<?php

namespace JasonRoman\NbaApi\Request\Stats\Widgets\Players;

use JasonRoman\NbaApi\Request\Stats\Data\AbstractStatsDataRequest;

/**
 * Get the players landing page sidebar. This contains several statistical categories and the top 3 players in each.
 */
class PlayersLandingSidebarRequest extends AbstractStatsDataRequest
{
    const ENDPOINT = '/js/data/widgets/players_landing_sidebar.json';
}