<?php
declare(strict_types = 1);

namespace JasonRoman\NbaApi\Request;

/**
 * This class is used as a base to add all request param values as query string parameters.
 */
abstract class AbstractQueryParamApiRequest extends AbstractApiRequest
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