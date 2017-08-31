<?php

namespace JasonRoman\NbaApi\Tests\Integration\Client\Data;

use JasonRoman\NbaApi\Client\Data\DataHtmlClient;
use JasonRoman\NbaApi\Request\Data\Html\Game\GameBookRequest;
use JasonRoman\NbaApi\Response\NbaApiResponse;
use JasonRoman\NbaApi\Tests\Integration\Client\BaseClientTestCase;

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
                $request->$param = $this->toValue($param, $value);
            }
        }

        $response = $this->client->getGameBook($request);

        $this->assertInstanceOf(NbaApiResponse::class, $response);
        $this->assertSame(200, $response->getResponse()->getStatusCode());

        $this->assertTrue($response->getResponse()->getHeader('Content-Type') === ['application/pdf']);
    }
}