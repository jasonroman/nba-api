<?php

namespace JasonRoman\NbaApi\Request\Stats\Widgets\Scores;

use JasonRoman\NbaApi\Request\AbstractStatsRequest;

/**
 * Get the scores leaders for today. If today has no games, this will show the most recent day that had games.
 */
class ScoresLeadersRequest extends AbstractStatsRequest
{
    const ENDPOINT = '/js/data/widgets/scores_leaders.json';
}