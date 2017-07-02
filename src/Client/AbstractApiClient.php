<?php
declare(strict_types = 1);

namespace JasonRoman\NbaApi\Client;

use GuzzleHttp\Client as GuzzleClient;
use GuzzleHttp\Exception\ClientException;
use GuzzleHttp\TransferStats;
use JasonRoman\NbaApi\Request\ApiRequestInterface;
use JasonRoman\NbaApi\Response\ApiResponse;
use JasonRoman\NbaApi\Response\ResponseType;
use Psr\Http\Message\ResponseInterface;
use Symfony\Component\Validator\Validation;
use JasonRoman\NbaApi\Request\AbstractApiRequest;
use Symfony\Component\Validator\ValidatorBuilderInterface;

/**
 * Abstract class that other API clients can extend from.
 */
abstract class AbstractApiClient
{
    const TIMEOUT         = 5;
    const CONNECT_TIMEOUT = 3;

    const DEFAULT_HEADERS = [
        // required headers
        'User-Agent'      =>
            'Mozilla/5.0 (Windows NT 10.0; Win64; x64) '.
            'AppleWebKit/537.36 (KHTML, like Gecko) '.
            'Chrome/58.0.3029.110 '.
            'Safari/537.36',
        'Origin'          => 'http://stats.nba.com',
        // this will be overridden by the response type of the individual request
        'Accept'          => 'application/json',
        // optional headers that might help prevent timeouts
        'DNT'             => '1',
        'Accept-Language' => 'en-US,en;q=0.8,af;q=0.6',
        'Accept-Encoding' => 'gzip, deflate, sdch',
        'Host'            => 'stats.nba.com',
        'Referer'         => 'http://stats.nba.com',
        'Content-Type'    => 'application/json',
        'Connection'      => 'keep-alive',
        'Cache-Control'   => 'no-cache, no-store, must-revalidate',
    ];

    /**
     * @var GuzzleClient
     */
    protected $guzzle;

    /**
     * @var bool
     */
    protected $validateRequest;

    /**
     * @var ValidatorBuilderInterface
     */
    protected $validator;

    /**
     * @return array
     */
    abstract protected function getHeaders();

    /**
     * @param (bool $validateRequest
     * @return mixed
     */
    //abstract protected function responseWrapper(ResponseInterface $response);

    /**
     * Create the guzzle client from the child class's config/headers, and any overridden parameters.
     * Instantiate the validator in case validation is to be performed later.
     *
     * @param array $config any additional Guzzle configuration that overrides any defaults
     * @param bool $validateRequest whether to validate requests with the Symfony Validator
     */
    public function __construct(array $config = [], $validateRequest = true)
    {
        $this->validateRequest = $validateRequest;
        $this->validator       = Validation::createValidatorBuilder()->enableAnnotationMapping()->getValidator();

        /*AnnotationRegistry::registerAutoloadNamespace(
            "Symfony\Component\Validator\Constraints",
            '/home/vagrant/dev/projects/nbasense/vendor/symfony/symfony/src'
        );*/

        /*AnnotationRegistry::registerAutoloadNamespaces([
            "Symfony\Component\Validator\Constraints" => '/home/vagrant/dev/projects/nbasense/vendor/symfony/symfony/src1',
            "JasonRoman\NbaApi\Constraints , '/home/vagrant/dev/projects/nbasense/vendor/jasonroman/nba-stats-api/src1'
        ]);*/


        $this->guzzle = new GuzzleClient(array_merge(
            static::CONFIG,
            ['headers' => $this->getHeaders()],
            $config
        ));
    }

    /**
     * @param ApiRequestInterface $request
     * @param array $config
     * @return ResponseInterface|null
     */
    public function doRequest(ApiRequestInterface $request, array $config = [])
    {
        // validate the request if specified, and throw an exception if invalid
        if ($this->validateRequest) {
            $violations = $this->validator->validate($request);

            if (count($violations)) {
                throw new \InvalidArgumentException((string) $violations);
            }
        }

        // convert all request parameters to string before sending the data
        $request->convertParamsToString();

        // override the default application/json accept headers based on the response type
        $acceptHeadersExtra = (in_array($request->getResponseType(), ResponseType::TYPES))
            ? ['headers' => ['Accept' => ResponseType::ACCEPT_HEADERS[$request->getResponseType()]]]
            : [];

        // return the response from the Guzzle request
        return $this->apiRequest(
            $request->getMethod(),
            $request->getEndpoint(),
            array_merge(
                $config,
                $acceptHeadersExtra,
                ['on_stats' => function (TransferStats $stats) {
                    dump($stats->getEffectiveUri());
                    dump($stats->getTransferTime());
                    dump($stats->getHandlerStats());
                    dump($stats->getRequest());

                    if ($stats->hasResponse()) {
                        dump($stats->getResponse()->getStatusCode());
                    }
                }]
            )
        );
    }

    /**
     * @param mixed $method
     * @param string $uri
     * @param array $options
     * @return mixed
     */
    public function apiRequest($method, $uri, array $options = [])
    {
        //try {
            $response = $this->guzzle->request($method, $uri, $options);
        //} catch (ClientException $e) {
            //throw $e;
            //$response = $e->getResponse();
        //}

        return $this->responseWrapper($response);
        //return ($response) ? $this->responseWrapper($response) : null;
    }

    /**
     * @param ResponseInterface $response
     * @return ApiResponse
     */
    public function responseWrapper(ResponseInterface $response)
    {
        return new ApiResponse($response);
    }

    /**
     * Get whether the request is to be validated.
     *
     * @return bool
     */
    public function getValidateRequest() : bool
    {
        return $this->validateRequest;
    }

    /**
     * Set whether the request should be validated.
     *
     * @param bool $validateRequest
     * @return $this
     */
    public function setValidateRequest(bool $validateRequest)
    {
        $this->validateRequest = $validateRequest;

        return $this;
    }
}