<?php declare(strict_types = 1);

namespace JasonRoman\NbaApi\Request;

/**
 * Base request interface for the NBA API.
 */
interface NbaApiRequestInterface
{
    /**
     * Get the Guzzle config - take the default and merge in the request-specific config.
     *
     * @return array
     */
    public function getConfig(): array;

    /**
     * Get the Guzzle headers - take the default and merge in the request-specific config.
     *
     * @return array
     */
    public function getHeaders(): array;

    /**
     * Get the HTTP request method.
     *
     * @return string
     */
    public function getMethod(): string;

    /**
     * Get the request type - essentially the domain request is coming from (ex: 'Data', 'Nba', 'Stats')
     *
     * @return string
     */
    public function getRequestType(): string;

    /**
     * Get the response type - what is expected to be returned (ex: 'json', 'pdf', 'xml')
     *
     * @return string
     */
    public function getResponseType(): string;

    /**
     * Retrieve the endpoint variables in the URL that get added to the base URL.
     *
     * @return string[]
     */
    public function getEndpointVars(): array;

    /**
     * Retrieve the endpoint in the URL that gets added to the base URL.
     *
     * @return string
     */
    public function getEndpoint(): string;

    /**
     * Retrieve the query params, which are all params minus any that occur as placeholders in the endpoint.
     *
     * @return array
     */
    public function getQueryParams(): array;

    /**
     * Retrieve the query params as a string
     *
     * @return string
     */
    public function getQueryString(): string;

    /**
     * Get the default parameter values for this request.
     *
     * @return array
     */
    public function getDefaultValues(): array;

    /**
     * Get the example parameter values for this request.
     *
     * @return array
     */
    public function getExampleValues(): array;

    /**
     * Convert params from an array to the proper request class. If set to use example values, this will use
     * example values and default values (examples take precedence). This is mainly a convenience so that a
     * a completely valid request can be generated without passing a single parameter.
     *
     * @param array $array
     * @param bool $useExampleValues
     * @return NbaApiRequestInterface
     */
    public static function fromArray(array $array, bool $useExampleValues): NbaApiRequestInterface;

    /**
     * Convert an API Request to an array that can be passed as a Guzzle 'query'.
     *
     * @return array
     */
    public function toArray(): array;
}