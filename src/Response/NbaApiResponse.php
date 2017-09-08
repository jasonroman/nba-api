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
     * @param bool $toArray
     * @return object|array
     * @throws \InvalidArgumentException
     */
    public function getFromJson(bool $toArray = false)
    {
        return GuzzleHttp\json_decode($this->response->getBody(), $toArray);
    }

    /**
     * This hard-casts the returned JSON to an object.
     *
     * @return \stdClass
     */
    public function getObjectFromJson(): \stdClass
    {
        return (object) $this->getFromJson(false);
    }

    /**
     * This may return an array if there are no key/value stores, however this recursively converts all
     * sub-arrays to objects as well. Use the appropriate functions as you see fit.
     *
     * @return \stdClass|array
     */
    public function getObjectPropertiesFromJson()
    {
        return $this->getFromJson(false);
    }

    /**
     * @return array
     */
    public function getArrayFromJson(): array
    {
        return $this->getFromJson(true);
    }

    /**
     * @return \SimpleXMLElement|false
     */
    public function getXml()
    {
        return simplexml_load_string((string) $this->response->getBody());
    }

    /**
     * @return ResponseInterface
     */
    public function getResponse()
    {
        return $this->response;
    }
}