<?php

namespace JasonRoman\NbaApi\Request\Stats;

abstract class AbstractBoxScoreRange extends AbstractStatsApiRequest
{
    /**
     * @var string
     */
    public $gameId;

    /**
     * @var int
     */
    public $startPeriod = 0;

    /**
     * @var int
     */
    public $endPeriod = 14;

    /**
     * @var int
     */
    public $startRange = 0;

    /**
     * @var int
     */
    public $endRange = 2147483647;

    /**
     * @var int
     */
    public $rangeType = 2;
}