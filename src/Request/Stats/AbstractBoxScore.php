<?php

namespace JasonRoman\NbaApi\Request\Stats;

abstract class AbstractBoxScore extends AbstractStatsApiRequest
{
    /**
     * @var string
     */
    public $gameId;
}