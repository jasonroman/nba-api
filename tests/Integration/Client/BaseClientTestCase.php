<?php declare(strict_types = 1);

namespace JasonRoman\NbaApi\Tests\Integration\Client;

use PHPUnit\Framework\TestCase;
use JasonRoman\NbaApi\Client\AbstractNbaClient;
use JasonRoman\NbaApi\Params\TeamIdParam;
use JasonRoman\NbaApi\Response\NbaApiResponse;

class BaseClientTestCase extends TestCase
{
    const REQUEST_METHOD_PREFIX = 'get';

    const DEFAULT_PARAMS = [
        'playerId' => 201939, // steph curry
        'teamId'   => TeamIdParam::DETROIT_PISTONS,
        'teamSlug' => 'pistons',
        'gameDate' => '2017-02-01', // will be converted to \DateTime as the request expects
        'gameId'   => '0021600732', // 2017-02-01 Toronto @ Boston Regular Season
        'year'     => 2016,
    ];

    const REQUEST_PARAMS = [];

    /**
     * @var AbstractNbaClient
     */
    protected $client;

    /**
     * {@inheritdoc}
     */
    protected function tearDown()
    {
        unset($this->client);
    }

    /**
     * Tests all public requests of a client; this only tests that a 200 response was received.
     */
    public function atestAllRequests()
    {
        $requestMethods = $this->getRequestMethods(get_class($this->client));

        foreach ($requestMethods as $requestMethod) {
            $className   = $requestMethod['class']->getName();
            $requestName = $requestMethod['name'];

            if (in_array($requestName, $this->getWhitelistedRequestMethods())) {
                continue;
            }

            dump("Testing $requestName of $className");

            /** @var AbstractNbaApiRequest $request */
            $request = $className::fromArray();

            // set default params
            foreach (static::getDefaultParams() as $param => $value) {
                if (property_exists($request, $param)) {
                    $request->$param = $this->toValue($param, $value);
                }
            }

            // now set individually-specified request params
            if (isset(static::REQUEST_PARAMS[$requestName])) {
                foreach (static::REQUEST_PARAMS[$requestName] as $param => $value) {
                    if (property_exists($request, $param)) {
                        $request->$param = $this->toValue($param, $value);;
                    }
                }
            }

            /** @var NbaApiResponse $response */
            $response = $this->client->$requestName($request);

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

    /**
     * @return array
     */
    protected function getDefaultParams() : array
    {
        return array_merge(self::DEFAULT_PARAMS, static::DEFAULT_PARAMS);
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
     * Return a list of methods that should not be tested globally; for example, when a PDF is returned by an endpoint.
     *
     * @return array
     */
    protected function getWhitelistedRequestMethods()
    {
        return [];
    }
}