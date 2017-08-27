<?php

namespace JasonRoman\NbaApi\Tests\Integration\Client;

use PHPUnit\Framework\TestCase;
use JasonRoman\NbaApi\Params\TeamIdParam;
use JasonRoman\NbaApi\Response\NbaApiResponse;

class BaseClientTestCase extends TestCase
{
    const REQUEST_METHOD_PREFIX = 'get';

    const DEFAULT_PARAMS = [
        'playerId' => 201939, // steph curry
        'teamId'   => TeamIdParam::DETROIT_PISTONS,
        'gameId'   => '0021500490', // 2016-01-01 Orlando vs. Washington Regular Season
        'year'     => 2016,
    ];

    protected function getDefaultParams() : array
    {
        return array_merge(self::DEFAULT_PARAMS, static::DEFAULT_PARAMS, ['gameDate' => new \DateTime('2016-01-01')]);
    }

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
    public function testAllRequests()
    {
        $requestMethods = $this->getRequestMethods(get_class($this->client));

        foreach ($requestMethods as $requestMethod) {
            $className   = $requestMethod['class']->getName();
            $requestName = $requestMethod['name'];

            /** @var AbstractNbaApiRequest $request */
            $request = $className::fromArray();

            foreach (static::getDefaultParams() as $param => $value) {
                if (property_exists($request, $param)) {
                    $request->$param = $value;
                }
            }

            /** @var NbaApiResponse $response */
            $response = $this->client->$requestName($request);

            $this->assertInstanceOf(NbaApiResponse::class, $response);
            $this->assertSame(200, $response->getResponse()->getStatusCode());

            $this->assertJson((string) $response->getResponse()->getBody());
            $this->assertInternalType('array', $response->getArrayFromJson());
            $this->assertInternalType('object', $response->getObjectFromJson());
        }
    }

    /**
     * Get all request methods of a class, skipping any methods in parent classes that are not declared in the class.
     * This skips any method that does not begin with 'get' and assumes all returned methods are requests.
     *
     * @param string $className
     * @return array
     */
    protected function getRequestMethods($className)
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
}