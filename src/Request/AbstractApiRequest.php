<?php

namespace JasonRoman\NbaApi\Request;

abstract class AbstractApiRequest
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
        return (new \ReflectionClass($this))->getShortName();
    }

    /**
     * Convert an API Request to an array that can be passed as a Guzzle 'query'.
     *
     * @return array
     */
    public function toArray()
    {
        return (array) $this;
    }

    /**
     * @param array $array
     * @return AbstractApiRequest
     */
    public static function fromArray(array $array)
    {
        $calledClass = get_called_class();
        $class = new $calledClass;

        foreach ($array as $key => $value) {
            $class->$key = $value;
        }

        return $class;
    }
}