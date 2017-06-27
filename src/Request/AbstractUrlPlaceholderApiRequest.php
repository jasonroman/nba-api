<?php
declare(strict_types = 1);

namespace JasonRoman\NbaApi\Request;

/**
 * This class is used as a base to replace placeholders with their request param values.
 */
abstract class AbstractUrlPlaceholderApiRequest extends AbstractApiRequest
{
    // hack way to force all classes that extend this to declare an ENDPOINT constant
    //const ENDPOINT = self::ENDPOINT;

    // default implementation uses {<param>} as a placeholder;
    // for example /data/{gameId}/scores will replace {gameId} with the value of $gameId in the request class
    const PLACEHOLDER_START = '{';
    const PLACEHOLDER_END   = '}';

    // default regex looks like the following: /{\K[^}]*(?=})/m
    const REGEX_GET_ENDPOINT_VARS = '/'.
        self::PLACEHOLDER_START.'\K[^'.self::PLACEHOLDER_END.']*(?='.self::PLACEHOLDER_END.')'.
    '/m';

    /**
     * {@inheritdoc}
     */
    public function getEndpoint() : string
    {
        // get the endpoint from the request class
        $endpoint = static::ENDPOINT;

        // get all endpoint variables that need replacing
        preg_match_all(self::REGEX_GET_ENDPOINT_VARS, static::ENDPOINT, $endpointVars);

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