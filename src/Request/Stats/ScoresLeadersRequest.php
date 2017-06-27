<?php

namespace JasonRoman\NbaApi\Request\Stats\Scores;

use Symfony\Component\Validator\Constraints as Assert;
use JasonRoman\NbaApi\Constraints as ApiAssert;
use JasonRoman\NbaApi\Request\Params\YearParam;

/**
 * Get the scores leaders for today. If today has no games, this will show the most recent day that had games.
 */
class ScoresLeadersRequest extends AbstractDataApiRequest
{
    const ENDPOINT = '/js/data/widgets/scores_leaders.json';
}