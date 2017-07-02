<?php

namespace JasonRoman\NbaApi\Response;

use GuzzleHttp;
use GuzzleHttp\Psr7\Response as GuzzleResponse;
use Psr\Http\Message\ResponseInterface;

/**
 * Guzzle Response wrapper class, making it easier to work with returned results.
 * Might want to look into Guzzle MiddleWare later, but the concept is general seems overly complex.
 */
class ApiResponse extends GuzzleResponse
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
     */
    public function getFromJsonBody($toArray = false)
    {
        return GuzzleHttp\json_decode($this->response->getBody(), $toArray);
    }

    /**
     * @return object
     */
    public function getObject()
    {
        return $this->getFromJsonBody(false);
    }

    /**
     * @return array
     */
    public function getArray()
    {
        return $this->getFromJsonBody(true);
    }

    /**
     * @return \SimpleXMLElement
     */
    public function getXml()
    {
        return simplexml_load_string($this->response->getBody());
    }

    /**
     * @return ResponseInterface
     */
    public function getResponse()
    {
        return $this->response;
    }
}