<?php

namespace JasonRoman\NbaApi\Request\Stats\Widgets\Teams;

use JasonRoman\NbaApi\Request\Stats\Data\AbstractStatsDataRequest;

/**
 * Get the teams landing page sidebar. This contains several statistical categories and the top 3 teams in each.
 */
class TeamsLandingSidebarRequest extends AbstractStatsDataRequest
{
    const ENDPOINT = '/js/data/widgets/teams_landing_sidebar.json';
}