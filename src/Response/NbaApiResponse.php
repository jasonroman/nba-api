<?php declare(strict_types = 1);

namespace JasonRoman\NbaApi\Response;

use GuzzleHttp;
use Psr\Http\Message\ResponseInterface;

/**
 * Guzzle Response wrapper class, making it easier to work with returned results.
 * Might want to look into Guzzle Middleware later, but that concept in general seems overly complex for this.
 */
class NbaApiResponse implements NbaApiResponseInterface
{
    /**
     * @var ResponseInterface
     */
    private $response;

    /**
     * @param ResponseInterface $response
     */
    public function __construct(ResponseInterface $response)
    {
        $this->response = $response;
    }

    /**
     * Convert a JSON response to an array or an object.
     *
     * @param bool $toArray
     * @return object|array
     * @throws \InvalidArgumentException
     */
    public function getFromJson(bool $toArray = false)
    {
        return GuzzleHttp\json_decode($this->getResponseBody(), $toArray);
    }

    /**
     * Convert a JSON response to an object via explicit type-casting.
     *
     * @return \stdClass
     */
    public function getObjectFromJson(): \stdClass
    {
        return (object) $this->getFromJson(false);
    }

    /**
     * Convert a JSON response to an object. This may return an array if there are no key/value stores,
     * however this recursively converts all sub-arrays to objects as well.
     *
     * @return \stdClass|array
     */
    public function getObjectPropertiesFromJson()
    {
        return $this->getFromJson(false);
    }

    /**
     * Convert a JSON response to an array.
     *
     * @return array
     */
    public function getArrayFromJson(): array
    {
        return $this->getFromJson(true);
    }

    /**
     * Convert an XML response to a \SimpleXMLElement object.
     *
     * @return \SimpleXMLElement|false
     */
    public function getXml()
    {
        return simplexml_load_string($this->getResponseBody());
    }

    /**
     * Retrieve the Guzzle response object.
     *
     * @return ResponseInterface
     */
    public function getResponse()
    {
        return $this->response;
    }

    /**
     * Retrieve the response body from Guzzle. Casts to string instead of returning the GuzzleHttp\Psr7\Stream object.
     *
     * @return string
     */
    public function getResponseBody()
    {
        return (string) $this->response->getBody();
    }
}