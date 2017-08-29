<?php

namespace JasonRoman\NbaApi\Tests\Integration\Client;

use JasonRoman\NbaApi\Client\DataProdClient;
use JasonRoman\NbaApi\Params\Data\PlayoffSeriesIdParam;
use JasonRoman\NbaApi\Params\Stats\PeriodParam;
use JasonRoman\NbaApi\Request\Data\Prod\Game\GameBookRequest;
use JasonRoman\NbaApi\Response\NbaApiResponse;

class DataProdClientTest extends BaseClientTestCase
{
    const DEFAULT_PARAMS = [
        'period'          => PeriodParam::MIN,
        'playoffSeriesId' => PlayoffSeriesIdParam::OPTIONS[0],
    ];

    const REQUEST_PARAMS = [
        'getDraftPick'              => [
            'year' => 2017,
        ],
        'getPreview'                => [
            'gameDate' => '20150201',
            'gameId'   => '0021400717',
        ],
        'getRecap'                  => [
            'gameDate' => '20150201',
            'gameId'   => '0021400717',
        ],
        'getTeamStatsLastFiveGames' => [
            'year' => 2015,
        ],
        'getTeamLeaders2015'        => [
            'year' => 2015,
        ],
        'getTeamRoster2015'         => [
            'year' => 2015,
        ],
        'getTeamSchedule2015'       => [
            'year' => 2015,
        ],
    ];

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