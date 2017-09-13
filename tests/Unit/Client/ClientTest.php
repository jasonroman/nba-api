<?php declare(strict_types=1);

namespace JasonRoman\NbaApi\Tests\Unit\Client;

use GuzzleHttp\Client as GuzzleClient;
use JasonRoman\NbaApi\Client\Client;
use JasonRoman\NbaApi\Response\NbaApiResponse;
use PHPUnit\Framework\TestCase;
use Symfony\Component\Validator\Validator\ValidatorInterface;

/**
 * Unit tests for the Client class.
 */
class ClientAllRequestsTest extends TestCase
{
    /**
     * @var Client
     */
    protected $client;

    /**
     * @var GuzzleClient
     */
    protected $guzzle;

    /**
     * @var ValidatorInterface
     */
    protected $validator;

    /**
     * {@inheritdoc}
     */
    protected function setUp()
    {
        $this->guzzle    = $this->getMockBuilder('GuzzleHttp\Client')->getMock();
        $this->validator = $this->getMockBuilder('Symfony\Component\Validator\Validator\ValidatorInterface')->getMock();

        $this->client = new Client([], true, $this->guzzle, $this->validator);
    }

    /**
     * {@inheritdoc}
     */
    protected function tearDown()
    {
        unset($this->client);
    }

    /**
     * @expectedException \Exception
     * @expectedExceptionMessage some violations
     */
    public function testRequestInvalid()
    {
        $nbaApiRequest = $this->getMockBuilder('JasonRoman\NbaApi\Request\AbstractNbaApiRequest')->getMock();

        // normally returns array, but just need value to check against (string) cast
        $this->validator
            ->expects($this->once())
            ->method('validate')
            ->willReturn('some violations');

        $response = $this->client->request($nbaApiRequest);
        $this->assertInstanceOf(NbaApiResponse::class, $response);
    }

    public function testRequest()
    {
        $nbaApiRequest = $this->getMockBuilder('JasonRoman\NbaApi\Request\AbstractNbaApiRequest')->getMock();

        $this->validator
            ->expects($this->once())
            ->method('validate')
            ->willReturn(null);

        $guzzleResponse = $this->getMockBuilder('Psr\Http\Message\ResponseInterface')->getMock();

        $this->guzzle
            ->expects($this->once())
            ->method('request')
            ->willReturn($guzzleResponse);

        $response = $this->client->request($nbaApiRequest);
        $this->assertInstanceOf(NbaApiResponse::class, $response);
    }

    public function testApiRequest()
    {
        $guzzleResponse = $this->getMockBuilder('Psr\Http\Message\ResponseInterface')->getMock();

        $this->guzzle
            ->expects($this->once())
            ->method('request')
            ->willReturn($guzzleResponse);

        $response = $this->client->apiRequest('GET', '/test');

        $this->assertInstanceOf(NbaApiResponse::class, $response);
        $this->assertSame($response->getResponse(), $guzzleResponse);
    }

    public function testGetSetValidateRequest()
    {
        $this->assertTrue($this->client->getValidateRequest());

        $this->client->setValidateRequest(false);
        $this->assertFalse($this->client->getValidateRequest());

        $this->client->setValidateRequest(true);
        $this->assertTrue($this->client->getValidateRequest());
    }
}