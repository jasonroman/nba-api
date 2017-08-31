<?php

namespace JasonRoman\NbaApi\Tests\Integration\Client;

use JasonRoman\NbaApi\Client\DataProdClient;
use JasonRoman\NbaApi\Client\GLeagueApiClient;
use JasonRoman\NbaApi\Client\NbaWscClient;
use JasonRoman\NbaApi\Params\Data\PlayoffSeriesIdParam;
use JasonRoman\NbaApi\Params\Stats\PeriodParam;
use JasonRoman\NbaApi\Params\TeamSlugParam;
use JasonRoman\NbaApi\Request\Data\Prod\Game\GameBookRequest;
use JasonRoman\NbaApi\Request\Nba\Wsc\Video\VideoRequest;
use JasonRoman\NbaApi\Response\NbaApiResponse;

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
            strpos('text/xml', $response->getResponse()->getHeader('Content-Type'))
        );
    }
}