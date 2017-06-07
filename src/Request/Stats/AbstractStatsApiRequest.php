<?php

namespace JasonRoman\NbaApi\Request\Stats;

use JasonRoman\NbaApi\Request\AbstractApiRequest;

abstract class AbstractStatsApiRequest extends AbstractApiRequest
{
    /**
     * The API endpoint in the URL.
     * For example: http://stats.nba.com/stats/boxscoremiscv2 would have an endpoint of 'boxscoremiscv2'
     *
     * If not overridden, this defaults to a lowercase string of the class's short name.
     * For example: \JasonRoman\NbaApi\Request\Stats\BoxScoreMiscV2 would return 'boxscoremiscv2'
     *
     * @return mixed
     */
    public function getEndpoint()
    {
        return strtolower((new \ReflectionClass($this))->getShortName());
    }
}