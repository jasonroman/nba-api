<?php

namespace JasonRoman\NbaApi\Request\Stats;

use Symfony\Component\Validator\Constraint as Assert;
use JasonRoman\NbaApi\Request\Stats\Params\LeagueId;

class VideoEvents extends AbstractStatsApiRequest
{
    /**
     * @Assert\NotBlank()
     */
    public $gameId;

    /**
     * @Assert\NotBlank()
     */
    public $gameEventId;
}