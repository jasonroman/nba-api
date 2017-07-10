<?php

namespace JasonRoman\NbaApi\Request\Stats\Widgets\Scores;

use JasonRoman\NbaApi\Request\AbstractStatsRequest;

/**
 * Get the scores sidebar. This appears to update with tailored information. For example, at the conclusion
 * of the 2016-2017 season, this contains standout performances for the 2016-2017 Regular Season.
 */
class ScoresSidebarRequest extends AbstractStatsRequest
{
    const ENDPOINT = '/js/data/widgets/scores_sidebar.json';
}