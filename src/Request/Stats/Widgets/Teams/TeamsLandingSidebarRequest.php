<?php

namespace JasonRoman\NbaApi\Request\Stats\Widges\Teams;

use JasonRoman\NbaApi\Request\AbstractStatsRequest;

/**
 * Get the teams landing page sidebar. This contains several statistical categories and the top 3 teams in each.
 */
class TeamsLandingSidebarRequest extends AbstractStatsRequest
{
    const ENDPOINT = '/js/data/widgets/teams_landing_sidebar.json';
}