<?php declare(strict_types = 1);

namespace JasonRoman\NbaApi\Tests\Integration\Client;

use JasonRoman\NbaApi\Client\Client;
use JasonRoman\NbaApi\Request\RequestHelper;
use PHPUnit\Framework\TestCase;
use JasonRoman\NbaApi\Client\AbstractNbaClient;
use JasonRoman\NbaApi\Request\Stats\Stats\AllStar\AllStarBallotPredictorRequest;
use JasonRoman\NbaApi\Response\NbaApiResponse;

/**
 * Test that all requests return valid; does not test specific data in the requests.
 */
class ClientAllRequestsTest extends TestCase
{
    /**
     * @var Client
     */
    protected $client;

    /**
     * {@inheritdoc}
     */
    protected function setUp()
    {
        $this->client = new Client();
    }

    /**
     * {@inheritdoc}
     */
    protected function tearDown()
    {
        unset($this->client);
    }

    /**
     * Return a list of request classes that should not be tested globally;
     * For example:
     *  - when a PDF is returned by an endpoint
     *  - when only XML is returned by an endpoint
     *  - when an endpoint may be valid (all star ballot predictor) but does not return results in off-season
     *
     * @return array
     */
    protected function getWhitelistedRequestClasses()
    {
        return [
            AllStarBallotPredictorRequest::class,
            \JasonRoman\NbaApi\Request\Data\Html\Game\GameBookRequest::class,
            \JasonRoman\NbaApi\Request\Data\Prod\Game\GameBookRequest::class,
            \JasonRoman\NbaApi\Request\Nba\Wsc\Video\VideoRequest::class,
        ];
    }
    /**
     * @param string $key
     * @param $value
     * @return mixed
     */
    protected function toValue(string $key, $value)
    {
        if (stripos($key, 'date') !== false && !$value instanceof \DateTime) {
            return new \DateTime($value);
        }

        return $value;
    }

    /**
     * Get all request methods of a class, skipping any methods in parent classes that are not declared in the class.
     * This skips any method that does not begin with 'get' and assumes all returned methods are requests.
     *
     * @param string $className
     * @return array
     */
    protected function getRequestMethods(string $className)
    {
        $reflectionClass = new \ReflectionClass($className);
        $methodNames     = [];

        // only retrieve public methods that start with 'get'
        foreach ($reflectionClass->getMethods(\ReflectionMethod::IS_PUBLIC) as $method) {
            if (
                $method->class == $className &&
                substr($method->name, 0, strlen(self::REQUEST_METHOD_PREFIX)) === self::REQUEST_METHOD_PREFIX
            ) {
                $requestClassParameter = new \ReflectionParameter([$className, $method->name], 0);

                // return the name of the class as well as the FQCN of the type-hinted request class
                $methodNames[] = [
                    'name'  => $method->name,
                    'class' => $requestClassParameter->getClass(),
                ];
            }
        }

        return $methodNames;
    }

    /**
     * Tests all public requests
     */
    public function testAllRequests()
    {
        $requestHelper  = new RequestHelper();
        $requestClasses = $requestHelper->getAllRequestClasses();

        foreach ($requestClasses as $requestClass) {
            if (in_array($requestClass, $this->getWhitelistedRequestClasses())) {
                continue;
            }

            dump("Testing $requestClass");

            /** @var AbstractNbaApiRequest $request */
            $request  = $requestClass::fromArrayWithExamples();
            $response = $this->client->request($request);

            $this->assertInstanceOf(NbaApiResponse::class, $response);
            $this->assertSame(200, $response->getResponse()->getStatusCode());

            $this->assertJson((string) $response->getResponse()->getBody());
            $this->assertInternalType('array', $response->getArrayFromJson());
            $this->assertInternalType('object', $response->getObjectFromJson());
            $this->assertTrue(is_array($response->getObjectsFromJson()) || is_object($response->getObjectsFromJson()));

            usleep(500000);
        }

        // in case all tests are skipped, this will not give a warning about a risky test
        $this->assertTrue(true);
    }

    public function atestGetNbaWscVideo()
    {
        $request  = \JasonRoman\NbaApi\Request\Nba\Wsc\Video\VideoRequest::fromArrayWithExamples();
        $response = $this->client->request($request);

        $this->assertInstanceOf(NbaApiResponse::class, $response);
        $this->assertSame(200, $response->getResponse()->getStatusCode());

        $this->assertSame(
            0,
            strpos($response->getResponse()->getHeader('Content-Type')[0], 'text/xml')
        );
    }

    public function atestGetDataHtmlGameBook()
    {
        $request  = \JasonRoman\NbaApi\Request\Data\Html\Game\GameBookRequest::fromArrayWithExamples();
        $response = $this->client->request($request);

        $this->assertInstanceOf(NbaApiResponse::class, $response);
        $this->assertSame(200, $response->getResponse()->getStatusCode());

        $this->assertTrue($response->getResponse()->getHeader('Content-Type') === ['application/pdf']);
    }

    public function atestGetDataProdGameBook()
    {
        $request  = \JasonRoman\NbaApi\Request\Data\Prod\Game\GameBookRequest::fromArrayWithExamples();
        $response = $this->client->request($request);

        $this->assertInstanceOf(NbaApiResponse::class, $response);
        $this->assertSame(200, $response->getResponse()->getStatusCode());

        $this->assertTrue($response->getResponse()->getHeader('Content-Type') === ['application/pdf']);
    }
}