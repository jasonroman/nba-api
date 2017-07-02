<?php

namespace JasonRoman\NbaApi\Request\Stats\Scores;

use Symfony\Component\Validator\Constraints as Assert;
use JasonRoman\NbaApi\Constraints as ApiAssert;
use JasonRoman\NbaApi\Request\Params\YearParam;

/**
 * Get the scores sidebar. This appears to update with tailored information. For example, at the conclusion
 * of the 2016-2017 season, this contains standout performances for the 2016-2017 Regular Season.
 */
class ScoresSidebarRequest extends AbstractDataRequest
{
    const ENDPOINT = '/js/data/widgets/scores_sidebar.json';
}