<?php

namespace JasonRoman\NbaApi\Request\Stats\Widges\Players;

use JasonRoman\NbaApi\Request\AbstractStatsRequest;

/**
 * Get the players landing page sidebar. This contains several statistical categories and the top 3 players in each.
 */
class PlayersLandingSidebarRequest extends AbstractStatsRequest
{
    const ENDPOINT = '/js/data/widgets/players_landing_sidebar.json';
}