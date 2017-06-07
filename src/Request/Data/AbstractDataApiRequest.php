<?php

namespace JasonRoman\NbaApi\Request\Data;

use JasonRoman\NbaApi\Request\AbstractApiRequest;

abstract class AbstractDataApiRequest extends AbstractApiRequest
{
    // hack way to force all classes that extend this to declare an ENDPOINT constant
    const ENDPOINT = self::ENDPOINT;

    const REGEX_GET_ENDPOINT_VARS = '/{\K[^}]*(?=})/m';

    /**
     * {@inheritdoc}
     */
    public function getEndpoint()
    {
        $endpoint = static::ENDPOINT;

        // get the endpoint variables that need replacing
        preg_match_all('/{\K[^}]*(?=})/m', static::ENDPOINT, $endpointVars);

        // remove duplicates
        $endpointVars = array_unique($endpointVars[0]);

        // loop through each endpoint variable and replace the class member value in the endpoint string
        foreach ($endpointVars as $endpointVar) {
            if (is_null($this->$endpointVar)) {
                throw new \Exception(sprintf("Missing class member value '%s' for request", $endpointVar));
            }

            $endpoint = str_replace('{'.$endpointVar.'}', $this->$endpointVar, $endpoint);
        }

        return $endpoint;
    }
}