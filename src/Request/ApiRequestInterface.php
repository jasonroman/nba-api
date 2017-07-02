<?php
declare(strict_types = 1);

namespace JasonRoman\NbaApi\Request;

interface ApiRequestInterface
{
    /**
     * Get the HTTP request method.
     *
     * @return string
     */
    public function getMethod() : string;

    /**
     * Get the request type - essentially where the request is coming from (ex: 'Data', 'Nba', 'Stats')
     *
     * @return string
     */
    public function getRequestType() : string;

    /**
     * Get the response type - what is expected to be returned (ex: 'json', 'pdf', 'xml')
     *
     * @return string
     */
    public function getResponseType() : string;

    /**
     * Retrieve the endpoint in the URL that gets added to the base URL.
     *
     * @return string
     */
    public function getEndpoint() : string;

    /**
     * Get the default parameter values for this request.
     *
     * @return array
     */
    public function getDefaultValues() : array;

    /**
     * Create a request from a passed in array of values.
     *
     * @param array $array
     * @return self
     */
    public static function fromArray(array $array = []) : ApiRequestInterface;

    /**
     * Convert an API Request to an array that can be passed as a Guzzle 'query'.
     *
     * @return array
     */
    public function toArray() : array;

    /**
     * Convert all request parameters to a string.
     */
    public function convertParamsToString();
}