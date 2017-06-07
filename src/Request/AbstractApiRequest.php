<?php

namespace JasonRoman\NbaApi\Request;

abstract class AbstractApiRequest
{
    /**
     * Retrieve the endpoint in the URL that gets added to the base URL.
     * @return string
     */
    abstract public function getEndpoint();

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
        $class       = new $calledClass;

        foreach ($array as $key => $value) {
            $class->$key = $value;
        }

        return $class;
    }
}