<?php

namespace JasonRoman\NbaApi\Tests\Integration\Client;

use JasonRoman\NbaApi\Client\StatsWidgetClient;

class StatsWidgetClientTest extends BaseClientTestCase
{
    const REQUEST_PARAMS = [
        'getBoxScoreBreakdown' => [
            'gameDateYmd' => '2017-01-01',
        ],
    ];

    /**
     * @var StatsWidgetClient
     */
    protected $client;

    /**
     * {@inheritdoc}
     */
    protected function setUp()
    {
        $this->client = new StatsWidgetClient();
    }
}