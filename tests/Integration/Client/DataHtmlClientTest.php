<?php

namespace JasonRoman\NbaApi\Tests\Integration\Client;

use JasonRoman\NbaApi\Client\DataHtmlClient;
use JasonRoman\NbaApi\Request\Data\Html\Game\GameBookRequest;
use JasonRoman\NbaApi\Response\NbaApiResponse;

class DataHtmlClientTest extends BaseClientTestCase
{
    /**
     * @var DataHtmlClient
     */
    protected $client;

    /**
     * {@inheritdoc}
     */
    protected function setUp()
    {
        $this->client = new DataHtmlClient();
    }

    /**
     * {@inheritdoc}
     */
    protected function getWhitelistedRequestMethods()
    {
        return ['getGameBook'];
    }

    public function testGetGameBook()
    {
        $request = GameBookRequest::fromArray();

        foreach (self::getDefaultParams() as $param => $value) {
            if (property_exists($request, $param)) {
                $request->$param = $value;
            }
        }

        $response = $this->client->getGameBook($request);

        $this->assertInstanceOf(NbaApiResponse::class, $response);
        $this->assertSame(200, $response->getResponse()->getStatusCode());

        $this->assertTrue($response->getResponse()->getHeader('Content-Type') === ['application/pdf']);
    }
}