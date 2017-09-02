<?php

namespace JasonRoman\NbaApi\Tests\Integration\Client\Data;

use JasonRoman\NbaApi\Client\Data\DataProdClient;
use JasonRoman\NbaApi\Params\Data\PlayoffSeriesIdParam;
use JasonRoman\NbaApi\Params\Stats\PeriodParam;
use JasonRoman\NbaApi\Request\Data\Prod\Game\GameBookRequest;
use JasonRoman\NbaApi\Response\NbaApiResponse;
use JasonRoman\NbaApi\Tests\Integration\Client\BaseClientTestCase;

class DataProdClientTest extends BaseClientTestCase
{
    /**
     * @var DataProdClient
     */
    protected $client;

    /**
     * {@inheritdoc}
     */
    protected function setUp()
    {
        $this->client = new DataProdClient();
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
        $request  = GameBookRequest::fromArrayWithExamples();
        $response = $this->client->getGameBook($request);

        $this->assertInstanceOf(NbaApiResponse::class, $response);
        $this->assertSame(200, $response->getResponse()->getStatusCode());

        $this->assertTrue($response->getResponse()->getHeader('Content-Type') === ['application/pdf']);
    }
}