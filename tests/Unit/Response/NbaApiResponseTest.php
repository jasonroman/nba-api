<?php

namespace JasonRoman\NbaApi\Tests\Unit\Response;

use GuzzleHttp\Psr7\Response;
use JasonRoman\NbaApi\Response\NbaApiResponse;
use PHPUnit\Framework\TestCase;

class NbaApiResponseTest extends TestCase
{
    public function testConstructAndGetResponse()
    {
        $guzzleResponse = $this->getMockBuilder('Psr\Http\Message\ResponseInterface')->getMock();
        $response       = new NbaApiResponse($guzzleResponse);

        $this->assertSame($guzzleResponse, $response->getResponse());
    }

    public function testGetFromJson()
    {
        $guzzleResponse = new Response(200, [], json_encode(['property1' => 'value1', 'property2' => 'value2']));
        $response       = new NbaApiResponse($guzzleResponse);

        $object = $response->getFromJson();

        $this->assertInstanceOf(\stdClass::class, $object);
        $this->assertObjectHasAttribute('property1', $object);
        $this->assertObjectHasAttribute('property2', $object);
        $this->assertSame('value1', $object->property1);
        $this->assertSame('value2', $object->property2);
    }

    public function testGetFromJsonToArray()
    {
        $guzzleResponse = new Response(200, [], json_encode(['property1' => 'value1', 'property2' => 'value2']));
        $response       = new NbaApiResponse($guzzleResponse);

        $object = $response->getObjectFromJson(true);

        $this->assertInstanceOf(\stdClass::class, $object);
        $this->assertObjectHasAttribute('property1', $object);
        $this->assertObjectHasAttribute('property2', $object);
        $this->assertSame('value1', $object->property1);
        $this->assertSame('value2', $object->property2);
    }

    public function testGetObjectFromJson()
    {
        $guzzleResponse = new Response(200, [], json_encode(['property1' => 'value1', 'property2' => 'value2']));
        $response       = new NbaApiResponse($guzzleResponse);

        $object = $response->getObjectFromJson();

        $this->assertInstanceOf(\stdClass::class, $object);
        $this->assertObjectHasAttribute('property1', $object);
        $this->assertObjectHasAttribute('property2', $object);
        $this->assertSame('value1', $object->property1);
        $this->assertSame('value2', $object->property2);
    }

    public function testGetObjectFromJsonComplex()
    {
        $class = new \stdClass;
        $class->test1 = 'test';
        $class->test2 = null;

        $responseBody   = ['property1', ['key1' => 'value1'], $class];
        $guzzleResponse = new Response(200, [], json_encode($responseBody));
        $response       = new NbaApiResponse($guzzleResponse);

        // forced as object; array indexes are now the properties
        $object = $response->getObjectFromJson();

        $this->assertInstanceOf(\stdClass::class, $object);

        $array = get_object_vars($object);

        $this->assertSame('property1', $array[0]);
        $this->assertInstanceOf(\stdClass::class, $array[1]);
        $this->assertObjectHasAttribute('key1', $array[1]);
        $this->assertSame('value1', $array[1]->key1);
        $this->assertEquals($class, $array[2]);
    }

    public function testGetArrayFromJson()
    {
        $guzzleResponse = new Response(200, [], json_encode(['property1' => 'value1', 'property2' => 'value2']));
        $response       = new NbaApiResponse($guzzleResponse);

        $array = $response->getArrayFromJson();

        $this->assertInternalType('array', $array);
        $this->assertCount(2, $array);
        $this->assertArrayHasKey('property1', $array);
        $this->assertArrayHasKey('property2', $array);
        $this->assertSame('value1', $array['property1']);
        $this->assertSame('value2', $array['property2']);
    }

    public function testGetObjectPropertiesFromJsonSame()
    {
        $responseBody   = ['property1', 'property2'];
        $guzzleResponse = new Response(200, [], json_encode($responseBody));
        $response       = new NbaApiResponse($guzzleResponse);

        // passing a single array to this function will return an array with the values
        $array = $response->getObjectPropertiesFromJson();

        $this->assertSame($responseBody, $array);
    }

    public function testGetObjectPropertiesFromJsonWithObjects()
    {
        $class = new \stdClass;
        $class->test1 = 'test';
        $class->test2 = null;

        $responseBody   = ['property1', ['key1' => 'value1'], $class];
        $guzzleResponse = new Response(200, [], json_encode($responseBody));
        $response       = new NbaApiResponse($guzzleResponse);

        // key/value pairs will be converted to classes
        $array = $response->getObjectPropertiesFromJson();

        $this->assertInternalType('array', $array);
        $this->assertCount(3, $array);
        $this->assertSame('property1', $array[0]);
        $this->assertInstanceOf(\stdClass::class, $array[1]);
        $this->assertObjectHasAttribute('key1', $array[1]);
        $this->assertSame('value1', $array[1]->key1);
        $this->assertEquals($class, $array[2]);
    }

    public function testGetXml()
    {
        $xmlString = '<?xml version="1.0" standalone="yes"?>
            <myxml>woohoo</myxml>
        ';

        $guzzleResponse = new Response(200, [], $xmlString);
        $response       = new NbaApiResponse($guzzleResponse);

        $xml = $response->getXml();

        $this->assertInstanceOf(\SimpleXMLElement::class, $xml);
        $this->assertSame('myxml', $xml->getName());
        $this->assertEquals(new \SimpleXMLElement($xmlString), $xml);
    }

    public function testGetResponse()
    {
        $guzzleResponse = new Response(200, [], json_encode(['property1' => 'value1', 'property2' => 'value2']));
        $response       = new NbaApiResponse($guzzleResponse);

        $this->assertSame($guzzleResponse, $response->getResponse());
    }

    public function testGetResponseBody()
    {
        $responseBody = 'some string';

        $guzzleResponse = new Response(200, [], $responseBody);
        $response       = new NbaApiResponse($guzzleResponse);

        $this->assertSame($responseBody, $response->getResponseBody());
    }
}