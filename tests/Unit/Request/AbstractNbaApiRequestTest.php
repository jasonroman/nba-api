<?php

namespace JasonRoman\NbaApi\Tests\Unit\Request;

use JasonRoman\NbaApi\Request\AbstractNbaApiRequest;
use JasonRoman\NbaApi\Request\RequestPropertyUtility;
use JasonRoman\NbaApi\Response\ResponseType;
use JasonRoman\NbaApi\Tests\Functional\Client\FixturesUnit\TestOtherNamespaceRequest;
use JasonRoman\NbaApi\Tests\Unit\Params\Fixtures\OverrideParam;
use JasonRoman\NbaApi\Tests\Unit\Params\Fixtures\Unit\DomainOverrideParam;
use JasonRoman\NbaApi\Tests\Unit\Request\Fixtures\AbstractTestRequest;
use JasonRoman\NbaApi\Tests\Unit\Request\Fixtures\Extra\TestBadNamespaceRequest;
use JasonRoman\NbaApi\Tests\Unit\Request\Fixtures\TestBadRootNamespaceRequest;
use JasonRoman\NbaApi\Tests\Unit\Request\Fixtures\TestBaseUriRequest;
use JasonRoman\NbaApi\Tests\Unit\Request\Fixtures\TestCodeRequest;
use JasonRoman\NbaApi\Tests\Unit\Request\Fixtures\TestConfigRequest;
use JasonRoman\NbaApi\Tests\Unit\Request\Fixtures\TestHeadersRequest;
use JasonRoman\NbaApi\Tests\Unit\Request\Fixtures\TestOverrideRequest;
use JasonRoman\NbaApi\Tests\Unit\Request\Fixtures\TestRequest;
use JasonRoman\NbaApi\Tests\Unit\Request\Fixtures\TestRequestBadSuffix;
use JasonRoman\NbaApi\Tests\Unit\Request\Fixtures\TestResponseTypeRequest;
use JasonRoman\NbaApi\Tests\Unit\Request\Fixtures\TestSimpleRequest;
use PHPUnit\Framework\TestCase;

class AbstractNbaApiRequestTest extends TestCase
{
    public function testGetConfigBase()
    {
        $request = new TestRequest();

        $this->assertSame(AbstractNbaApiRequest::DEFAULT_CONFIG, $request->getConfig());
    }

    public function testGetConfigOverride()
    {
        $request = new TestConfigRequest();

        $config = $request->getConfig();

        $this->assertSame(TestConfigRequest::CONFIG['timeout'], $config['timeout']);
        $this->assertSame(AbstractNbaApiRequest::CONNECT_TIMEOUT, $config['connect_timeout']);

        $this->assertArrayHasKey('something_else', $config);
        $this->assertSame(TestConfigRequest::CONFIG['something_else'], $config['something_else']);
    }

    public function testGetHeaders()
    {
        $request = new TestRequest();

        $this->assertSame(AbstractNbaApiRequest::DEFAULT_HEADERS, $request->getHeaders());
    }

    public function testGetHeadersOverride()
    {
        $request = new TestHeadersRequest();

        $headers = $request->getHeaders();

        $this->assertSame(AbstractNbaApiRequest::DEFAULT_HEADERS['User-Agent'], $headers['User-Agent']);
        $this->assertSame(AbstractNbaApiRequest::DEFAULT_HEADERS['Origin'], $headers['Origin']);
        $this->assertSame(AbstractNbaApiRequest::DEFAULT_HEADERS['DNT'], $headers['DNT']);
        $this->assertSame(AbstractNbaApiRequest::DEFAULT_HEADERS['Accept-Language'], $headers['Accept-Language']);
        $this->assertSame(AbstractNbaApiRequest::DEFAULT_HEADERS['Accept-Encoding'], $headers['Accept-Encoding']);
        $this->assertSame(AbstractNbaApiRequest::DEFAULT_HEADERS['Referer'], $headers['Referer']);
        $this->assertSame(AbstractNbaApiRequest::DEFAULT_HEADERS['Content-Type'], $headers['Content-Type']);
        $this->assertSame(AbstractNbaApiRequest::DEFAULT_HEADERS['Connection'], $headers['Connection']);
        $this->assertSame(AbstractNbaApiRequest::DEFAULT_HEADERS['Cache-Control'], $headers['Cache-Control']);

        $this->assertSame(TestHeadersRequest::HEADERS['Accept'], $headers['Accept']);
        $this->assertSame(TestHeadersRequest::HEADERS['Host'], $headers['Host']);

        $this->assertArrayHasKey('X-Other', $headers);
        $this->assertSame(TestHeadersRequest::HEADERS['X-Other'], $headers['X-Other']);
    }

    public function testGetMethod()
    {
        $request = new TestRequest();

        $this->assertSame(AbstractNbaApiRequest::DEFAULT_METHOD, $request->getMethod());
    }

    public function testGetRequestType()
    {
        // TestRequest is in JasonRoman\NbaApi\Tests\Unit\Request\Fixtures with base domain JasonRoman\NbaApi\Tests
        // this means that the Domain\Section\Category is Unit\Request\Fixtures
        $request = new TestRequest();

        $this->assertSame('Unit', $request->getRequestType());
    }

    public function testGetResponseType()
    {
        $request = new TestRequest();
        $this->assertSame(AbstractNbaApiRequest::DEFAULT_RESPONSE_TYPE, $request->getResponseType());

        $request->format = ResponseType::XML;
        $this->assertSame(ResponseType::XML, $request->getResponseType());
    }

    public function testGetResponseTypeOverride()
    {
        $request = new TestResponseTypeRequest();
        $this->assertSame(ResponseType::PDF, $request->getResponseType());
    }

    public function testGetEndpoint()
    {
        $now     = new \DateTime;
        $request = new TestRequest();

        $request->test = $now;
        $request->bool = false;

        $this->assertSame(
            'stats/false/test/'.$now->format(RequestPropertyUtility::DEFAULT_DATETIME_FORMAT).'/false/request.json',
            $request->getEndpoint()
        );

        $requestSimple = new TestSimpleRequest();

        $requestSimple->test = 'test';

        $this->assertSame('simple/test/request.json', $requestSimple->getEndpoint());
    }

    /**
     * @expectedException \Exception
     * @expectedExceptionMessage Missing class member value 'bool' for request
     */
    public function testGetEndpointMissingPlaceholder()
    {
        $request       = new TestRequest();
        $request->test = new \DateTime();

        $request->getEndpoint();
    }

    public function testGetEndpointOverride()
    {
        $request = new TestOverrideRequest();

        $request->override       = 'override';
        $request->domainOverride = 'domainOverride';

        $this->assertSame(
            '/some/override_and_some_extra/and/domainOverride_and_some_domain_extra.json',
            $request->getEndpoint()
        );
    }

    public function testGetEndpointVarsNoDuplicates()
    {
        $request = new TestRequest();

        $this->assertSame(['bool', 'test'], $request->getEndpointVars());
    }

    public function testGetEndpointVarsEmpty()
    {
        $request = new TestResponseTypeRequest();

        $this->assertSame([], $request->getEndpointVars());
    }

    public function testGetEndpointVarsSimple()
    {
        $request = new TestSimpleRequest();

        $this->assertSame(['test'], $request->getEndpointVars());
    }

    public function testGetQueryParams()
    {
        $request = new TestSimpleRequest();

        $this->assertSame(['queryParam' => ''], $request->getQueryParams());
    }

    public function testGetQueryStringEmpty()
    {
        $request = new TestResponseTypeRequest();

        $this->assertSame('', $request->getQueryString());
    }

    public function testGetQueryStringNotEmpty()
    {
        // notice that placeholders are not included in the query string
        $request = new TestSimpleRequest();

        $this->assertSame('queryParam=', $request->getQueryString());
    }

    public function testGetDefaultValuesEmpty()
    {
        $request = new TestSimpleRequest();

        $this->assertSame([], $request->getDefaultValues());
    }

    public function testGetDefaultValuesFromRequest()
    {
        $request = new TestRequest();

        $this->assertEquals(
            [
                'test'     => 1,
                'noVar'    => 'default',
                'bool'     => true,
                'dateTime' => new \DateTime('2017-01-01'),
            ],
            $request->getDefaultValues()
        );
    }

    public function testGetExampleValuesEmpty()
    {
        $request = new TestSimpleRequest();

        $this->assertSame([], $request->getExampleValues());
    }

    public function testGetExampleValuesFromRequest()
    {
        $request = new TestRequest();

        $this->assertEquals(
            [
                'test'          => 5,
                'noDescription' => [1, 2, 3, 4, 5],
                'bool'          => false,
            ],
            $request->getExampleValues()
        );
    }

    public function testFromArrayNoValues()
    {
        $request = TestSimpleRequest::fromArray();

        $this->assertEquals(new TestSimpleRequest(), $request);
    }

    public function testFromArrayWith()
    {
        $request = TestSimpleRequest::fromArray(['test' => 'something', 'queryParam' => 5]);

        $this->assertSame('something', $request->test);
        $this->assertSame(5, $request->queryParam);
    }

    public function testFromArray()
    {
        $baselineRequest = new TestRequest();
        $defaultValues   = $baselineRequest->getDefaultValues();

        $request = TestRequest::fromArray();

        $this->assertInstanceOf(TestRequest::class, $request);

        $this->assertSame($defaultValues['test'], $request->test);
        $this->assertSame($defaultValues['noVar'], $request->noVar);
        $this->assertSame($defaultValues['bool'], $request->bool);
        $this->assertEquals($defaultValues['dateTime'], $request->dateTime);
        $this->assertNull($request->notBlank);
        $this->assertNull($request->noCount);
    }

    public function testToArrayNoValues()
    {
        $request = new TestSimpleRequest();

        $this->assertSame(['test' => null, 'queryParam' => null], $request->toArray());
    }

    public function testToArray()
    {
        $request       = new TestSimpleRequest();
        $request->test = 'some value';

        $this->assertSame(['test' => 'some value', 'queryParam' => null], $request->toArray());
    }

    public function testFromArrayWithExamplesNoValues()
    {
        $request = TestSimpleRequest::fromArrayWithExamples();

        $this->assertEquals(new TestSimpleRequest(), $request);
    }

    public function testFromArrayWithExamples()
    {
        $baselineRequest = new TestRequest();
        $defaultValues   = $baselineRequest->getDefaultValues();
        $exampleValues   = $baselineRequest->getExampleValues();

        $request = TestRequest::fromArrayWithExamples();

        $this->assertInstanceOf(TestRequest::class, $request);

        // example values override default values if both exist
        $this->assertSame($exampleValues['test'], $request->test);
        $this->assertSame($exampleValues['noDescription'], $request->noDescription);
        $this->assertSame($defaultValues['noVar'], $request->noVar);
        $this->assertSame($exampleValues['bool'], $request->bool);
        $this->assertEquals($defaultValues['dateTime'], $request->dateTime);
        $this->assertNull($request->notBlank);
        $this->assertNull($request->noCount);
    }

    public function testFromArrayAliasToFromArrayWithExamples()
    {
        $requestFromArray             = TestRequest::fromArray([], true);
        $requestFromArrayWithExamples = TestRequest::fromArrayWithExamples();

        $this->assertEquals($requestFromArray, $requestFromArrayWithExamples);

        $requestResponseTypeFromArray             = TestResponseTypeRequest::fromArray([], true);
        $requestResponseTypeFromArrayWithExamples = TestResponseTypeRequest::fromArrayWithExamples();

        $this->assertEquals($requestResponseTypeFromArray, $requestResponseTypeFromArrayWithExamples);

        $requestSimpleFromArray             = TestSimpleRequest::fromArray([], true);
        $requestSimpleFromArrayWithExamples = TestSimpleRequest::fromArrayWithExamples();

        $this->assertEquals($requestSimpleFromArray, $requestSimpleFromArrayWithExamples);
    }

    public function testGetDefaultValue()
    {
        $this->assertSame(1, TestRequest::getDefaultValue('test'));
        $this->assertSame('default', TestRequest::getDefaultValue('noVar'));
        $this->assertTrue(TestRequest::getDefaultValue('bool'));
        $this->assertEquals(new \DateTime('2017-01-01'), TestRequest::getDefaultValue('dateTime'));
        $this->assertNull(TestRequest::getDefaultValue('range'));
    }

    public function testGetDefaultValueBaseOverride()
    {
        $this->assertSame(OverrideParam::DEFAULT, TestOverrideRequest::getDefaultValue('override'));
        $this->assertSame(DomainOverrideParam::DEFAULT, TestOverrideRequest::getDefaultValue('domainOverride'));
    }

    public function testGetExampleValueBaseOverride()
    {
        $this->assertSame(OverrideParam::EXAMPLE, TestOverrideRequest::getExampleValue('override'));
        $this->assertSame(DomainOverrideParam::EXAMPLE, TestOverrideRequest::getExampleValue('domainOverride'));
    }

    public function testGetDefaultValueDomainOverride()
    {
        $this->assertSame(OverrideParam::DEFAULT, TestOverrideRequest::getDefaultValue('override'));
        $this->assertSame(DomainOverrideParam::DEFAULT, TestOverrideRequest::getDefaultValue('domainOverride'));
    }

    public function testGetExampleValueDomainOverride()
    {
        $this->assertSame(OverrideParam::EXAMPLE, TestOverrideRequest::getExampleValue('override'));
        $this->assertSame(DomainOverrideParam::EXAMPLE, TestOverrideRequest::getExampleValue('domainOverride'));
    }

    public function testGetExampleValue()
    {
        $this->assertSame(5, TestRequest::getExampleValue('test'));
        $this->assertSame([1, 2, 3, 4, 5], TestRequest::getExampleValue('noDescription'));
        $this->assertFalse(TestRequest::getExampleValue('bool'));
        $this->assertNull(TestRequest::getExampleValue('dateTime'));
        $this->assertNull(TestRequest::getExampleValue('range'));
    }

    public function testGetValue()
    {
        $this->assertSame(1, TestRequest::getValue('test', AbstractNbaApiRequest::PARAM_DEFAULT_METHOD));
        $this->assertSame('default', TestRequest::getValue('noVar', AbstractNbaApiRequest::PARAM_DEFAULT_METHOD));
        $this->assertTrue(TestRequest::getValue('bool', AbstractNbaApiRequest::PARAM_DEFAULT_METHOD));
        $this->assertEquals(
            new \DateTime('2017-01-01'),
            TestRequest::getValue('dateTime', AbstractNbaApiRequest::PARAM_DEFAULT_METHOD)
        );
        $this->assertNull(TestRequest::getValue('range', AbstractNbaApiRequest::PARAM_DEFAULT_METHOD));

        $this->assertSame(5, TestRequest::getValue('test', AbstractNbaApiRequest::PARAM_EXAMPLE_METHOD));
        $this->assertSame(
            [1, 2, 3, 4, 5],
            TestRequest::getValue('noDescription', AbstractNbaApiRequest::PARAM_EXAMPLE_METHOD)
        );
        $this->assertFalse(TestRequest::getValue('bool', AbstractNbaApiRequest::PARAM_EXAMPLE_METHOD));
        $this->assertNull(TestRequest::getValue('dateTime', AbstractNbaApiRequest::PARAM_EXAMPLE_METHOD));
        $this->assertNull(TestRequest::getValue('range', AbstractNbaApiRequest::PARAM_EXAMPLE_METHOD));
    }

    /**
     * Helper function tests
     */
    public function testGetFullUrl()
    {
        $request = new TestSimpleRequest();

        $request->test       = 'test';
        $request->queryParam = 3;

        $this->assertSame(
            AbstractTestRequest::BASE_URI.'simple/test/request.json/?queryParam=3',
            $request->getFullUrl()
        );
    }

    public function testGetFullBaseEndpoint()
    {
        $request = new TestSimpleRequest();

        $this->assertSame(AbstractTestRequest::BASE_URI.TestSimpleRequest::ENDPOINT, $request->getFullBaseEndpoint());
    }

    public function testGetPublicProperties()
    {
        $request = new TestSimpleRequest();

        $publicProperties = $request->getPublicProperties();

        $this->assertSame('test', $publicProperties[0]->getName());
        $this->assertEquals(TestSimpleRequest::class, $publicProperties[0]->class);

        $this->assertSame('queryParam', $publicProperties[1]->getName());
        $this->assertEquals(TestSimpleRequest::class, $publicProperties[1]->class);
    }

    public function testGetParamNames()
    {
        $request = new TestSimpleRequest();

        $this->assertSame(['test', 'queryParam'], $request->getParamNames());
    }

    public function testGetParamsInfo()
    {
        $request    = new TestRequest();
        $paramsInfo = $request->getParamsInfo();

        $this->assertInternalType('array', $paramsInfo);

        foreach ($paramsInfo as $paramInfo) {
            $this->assertInternalType('array', $paramInfo);
        }

        $requestSimple    = new TestSimpleRequest();
        $paramsInfoSimple = $requestSimple->getParamsInfo();

        $this->assertCount(2, $paramsInfoSimple);
    }

    public function testGetParamInfo()
    {
        $request = new TestRequest();

        $notBlank = $request->getParamInfo('notBlank');

        $this->assertTrue($notBlank['is_required']);
        $this->assertTrue($notBlank['is_not_blank']);
        $this->assertFalse($notBlank['is_not_null']);

        $noNotBlank = $request->getParamInfo('noNotBlank');

        $this->assertFalse($noNotBlank['is_required']);
        $this->assertFalse($noNotBlank['is_not_blank']);
        $this->assertFalse($noNotBlank['is_not_null']);

        $notNull = $request->getParamInfo('notNull');

        $this->assertTrue($notNull['is_required']);
        $this->assertFalse($notNull['is_not_blank']);
        $this->assertTrue($notNull['is_not_null']);

        $noNotNull = $request->getParamInfo('noNotNull');

        $this->assertFalse($noNotNull['is_required']);
        $this->assertFalse($noNotNull['is_not_blank']);
        $this->assertFalse($noNotNull['is_not_null']);

        $all = $request->getParamInfo('all');

        $this->assertTrue($all['is_array']);
        $this->assertTrue($all['is_required']);
        $this->assertTrue($all['is_not_null']);
        $this->assertSame('int[]', $all['type']);

        $test = $request->getParamInfo('test');

        $this->assertSame('\DateTime', $test['type']);
        $this->assertSame("Here is\na description.", $test['description']);

        $bool = $request->getParamInfo('bool');
        $this->assertSame('bool', $bool['type']);

        $choices = $request->getParamInfo('choices');
        $this->assertSame(TestRequest::OPTIONS, $choices['choices']);

        $regex = $request->getParamInfo('regex');
        $this->assertSame(TestRequest::REGEX, $regex['regex']);

        $range = $request->getParamInfo('range');
        $this->assertSame(['min' => 1, 'max' => 5], $range['range']);

        $count = $request->getParamInfo('count');
        $this->assertSame(['min' => 5, 'max' => 5], $count['count']);

        $uuidStrict = $request->getParamInfo('uuidStrict');
        $this->assertSame(RequestPropertyUtility::UUID_CONSTRAINT_STRICT_VALUE, $uuidStrict['uuid']);

        $uuidNotStrict = $request->getParamInfo('uuidNotStrict');
        $this->assertSame(RequestPropertyUtility::UUID_CONSTRAINT_NON_STRICT_VALUE, $uuidNotStrict['uuid']);
    }

    public function testGetParamsAsCode()
    {
        // test default/example values and also setting an override
        $request = TestCodeRequest::fromArrayWithExamples([
            'string' => 'test',
        ]);

        $this->assertSame(
            [
                'dateTime' => "new \DateTime('2017-09-29')",
                'boolTrue' => 'true',
                'boolFalse' => 'false',
                'array' => "[1, '2', false]",
                'null' => 'null',
                'int' => '5',
                'float' => '5.5',
                'string' => "'test'",
            ],
            $request->getParamsAsCode()
        );
    }

    public function testGetMainNamespaceAndRequest()
    {
        $this->assertSame(
            'Unit\Request\Fixtures\TestSimpleRequest',
            TestSimpleRequest::getMainNamespaceAndRequest()
        );
        $this->assertSame(
            'Functional\Client\FixturesUnit\TestOtherNamespaceRequest',
            TestOtherNamespaceRequest::getMainNamespaceAndRequest()
        );
    }

    /**
     * @expectedException \Exception
     * @expectedExceptionMessage Request must have root namespace of 'invalid'
     */
    public function testGetMainNamespaceAndRequestPartsInvalidRootNamespace()
    {
        TestBadRootNamespaceRequest::getMainNamespaceAndRequest();
    }

    public function testGetMainNamespaceAndRequestParts()
    {
        $parts = TestSimpleRequest::getMainNamespaceAndRequestParts();

        $this->assertCount(4, $parts);
        $this->assertSame(['Unit', 'Request', 'Fixtures', 'TestSimpleRequest'], $parts);
    }

    /**
     * @expectedException \Exception
     * @expectedExceptionMessage Request does not have a proper Domain, Section, and Category
     */
    public function testGetMainNamespaceAndRequestPartsInvalidCount()
    {
        TestBadNamespaceRequest::getMainNamespaceAndRequestParts();
    }

    public function testGetDomain()
    {
        $this->assertSame('Unit', AbstractTestRequest::getDomain());
        $this->assertSame('Unit', TestRequest::getDomain());
        $this->assertSame('Functional', TestOtherNamespaceRequest::getDomain());
    }

    public function testGetSection()
    {
        $this->assertSame('Request', AbstractTestRequest::getSection());
        $this->assertSame('Request', TestRequest::getSection());
        $this->assertSame('Client', TestOtherNamespaceRequest::getSection());
    }

    public function testGetCategory()
    {
        $this->assertSame('Fixtures', AbstractTestRequest::getCategory());
        $this->assertSame('Fixtures', TestRequest::getCategory());
        $this->assertSame('FixturesUnit', TestOtherNamespaceRequest::getCategory());
    }

    public function testGetRequestName()
    {
        $this->assertSame('AbstractTest', AbstractTestRequest::getRequestName());
        $this->assertSame('Test', TestRequest::getRequestName());
        $this->assertSame('TestSimple', TestSimpleRequest::getRequestName());
    }

    /**
     * @expectedException \Exception
     * @expectedExceptionMessage Request class name must end with 'Request'
     */
    public function testGetRequestNameInvalidRequestName()
    {
        TestRequestBadSuffix::getRequestName();
    }

    public function testGetShortName()
    {
        $this->assertSame('AbstractTestRequest', AbstractTestRequest::getShortName());
        $this->assertSame('TestRequest', TestRequest::getShortName());
        $this->assertSame('TestSimpleRequest', TestSimpleRequest::getShortName());
    }

    public function testGetFqcn()
    {
        $this->assertSame(AbstractTestRequest::class, AbstractTestRequest::getFqcn());
        $this->assertSame(TestSimpleRequest::class, TestSimpleRequest::getFqcn());
    }

    public function testGetBaseUri()
    {
        $this->assertSame(AbstractTestRequest::BASE_URI, AbstractTestRequest::getBaseUri());
        $this->assertSame(TestBaseUriRequest::BASE_URI, TestBaseUriRequest::getBaseUri());
    }

    public function testGetDefaultResponseType()
    {
        $this->assertSame(AbstractNbaApiRequest::DEFAULT_RESPONSE_TYPE, AbstractTestRequest::getDefaultResponseType());
        $this->assertSame(AbstractNbaApiRequest::DEFAULT_RESPONSE_TYPE, TestRequest::getDefaultResponseType());
        $this->assertSame(ResponseType::PDF, TestResponseTypeRequest::getDefaultResponseType());
    }

    public function testGetNamespace()
    {
        $this->assertSame(AbstractTestRequest::BASE_NAMESPACE.'\Unit\Request\Fixtures', TestRequest::getNamespace());
    }
}