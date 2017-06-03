<?php

namespace JasonRoman\NbaApi\Request\Stats;

class AllStarBallotPredictor extends AbstractStatsApiRequest
{
    /**
     * @var string
     */
    public $gameId;

    /**
     * @var int
     */
    public $startPeriod;

    /**
     * @var int
     */
    public $endPeriod;

    /**
     * @var int
     */
    public $startRange;

    /**
     * @var int
     */
    public $endRange;

    /**
     * @var string
     */
    public $rangeType;
}