<?php

namespace JasonRoman\NbaApi\Tests\Integration\Client\Nba;

use JasonRoman\NbaApi\Client\Nba\NbaWscClient;
use JasonRoman\NbaApi\Request\Nba\Wsc\Video\VideoRequest;
use JasonRoman\NbaApi\Response\NbaApiResponse;
use JasonRoman\NbaApi\Tests\Integration\Client\BaseClientTestCase;

class NbaWscApiClientTest extends BaseClientTestCase
{
    const DEFAULT_PARAMS = [
        'videoId' => '087a6075-00fc-187d-3f9b-10023abe58a3',
    ];

    /**
     * @var NbaWscClient
     */
    protected $client;

    /**
     * {@inheritdoc}
     */
    protected function setUp()
    {
        $this->client = new NbaWscClient();
    }

    /**
     * {@inheritdoc}
     */
    protected function getWhitelistedRequestMethods()
    {
        return ['getVideo'];
    }

    public function testGetVideo()
    {
        $request = VideoRequest::fromArray();

        foreach (self::getDefaultParams() as $param => $value) {
            if (property_exists($request, $param)) {
                $request->$param = $this->toValue($param, $value);
            }
        }

        $response = $this->client->getVideo($request);

        $this->assertInstanceOf(NbaApiResponse::class, $response);
        $this->assertSame(200, $response->getResponse()->getStatusCode());

        $this->assertSame(
            0,
            strpos($response->getResponse()->getHeader('Content-Type')[0], 'text/xml')
        );
    }
}