<?php declare(strict_types = 1);

namespace JasonRoman\NbaApi\Client;

use GuzzleHttp\Client as GuzzleClient;
use GuzzleHttp\Exception\ClientException;
use GuzzleHttp\TransferStats;
use Psr\Http\Message\ResponseInterface;
use Symfony\Component\Validator\Validation;
use Symfony\Component\Validator\ValidatorBuilderInterface;
use JasonRoman\NbaApi\Request\AbstractNbaApiRequest;
use JasonRoman\NbaApi\Response\NbaApiResponse;
use JasonRoman\NbaApi\Response\ResponseType;

/**
 * Main Client class that processes requests.
 */
class Client
{
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
            "Symfony\Component\Validator\Constraints" => '/home/vagrant/dev/projects/nbasense/vendor/symfony/symfony/src',
            "JasonRoman\NbaApi\Constraints => '/home/vagrant/dev/projects/nbasense/vendor/jasonroman/nba-stats-api/src'
        ]);*/

        $this->guzzle = new GuzzleClient($config);
    }

    /**
     * @param AbstractNbaApiRequest $request
     * @param array $config
     * @return NbaApiResponse
     * @throws \Exception if validation fails
     */
    public function request(AbstractNbaApiRequest $request, array $config = []): NbaApiResponse
    {
        // validate the request if specified, and throw an exception if invalid
        if ($this->validateRequest) {
            $violations = $this->validator->validate($request);

            if (count($violations)) {
                throw new \Exception((string) $violations);
            }
        }

        // clone and convert all request parameters to string before sending the data
        // this is done so that the original request object is not modified in any way
        $apiRequest = clone $request;
        $apiRequest->convertParamsToString();

        // override the default application/json accept headers based on the response type
        $acceptHeadersExtra = (in_array($apiRequest->getResponseType(), ResponseType::TYPES))
            ? ['Accept' => ResponseType::ACCEPT_HEADERS[$apiRequest->getResponseType()]]
            : [];

        // return the response from the Guzzle request
        return $this->apiRequest(
            $apiRequest->getMethod(),
            $apiRequest->getEndpoint(),
            array_merge(
                ['query' => $apiRequest->getQueryParams()],
                ['headers' => array_merge($apiRequest->getHeaders(), $acceptHeadersExtra)],
                array_merge($apiRequest->getConfig(), $config),
                // for testing purposes
                ['on_stats' => function (TransferStats $stats) {
                    //dump($stats->getRequest());
                }]
            )
        );
    }

    /**
     * @param mixed $method
     * @param string $uri
     * @param array $options
     * @return NbaApiResponse
     * @throws ClientException
     */
    public function apiRequest($method, $uri, array $options = []): NbaApiResponse
    {
        $response = $this->guzzle->request($method, $uri, $options);

        return $this->responseWrapper($response);
    }

    /**
     * @param ResponseInterface $response
     * @return NbaApiResponse
     */
    public function responseWrapper(ResponseInterface $response): NbaApiResponse
    {
        return new NbaApiResponse($response);
    }

    /**
     * Get whether the request is to be validated.
     *
     * @return bool
     */
    public function getValidateRequest(): bool
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