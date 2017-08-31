<?php

namespace JasonRoman\NbaApi\Tests\Integration\Client\Stats;

use JasonRoman\NbaApi\Client\Stats\StatsWidgetsClient;
use JasonRoman\NbaApi\Tests\Integration\Client\BaseClientTestCase;

class StatsWidgetsClientTest extends BaseClientTestCase
{
    const REQUEST_PARAMS = [
        'getBoxScoreBreakdown' => [
            'gameDateYmd' => '2017-01-01',
        ],
    ];

    /**
     * @var StatsWidgetsClient
     */
    protected $client;

    /**
     * {@inheritdoc}
     */
    protected function setUp()
    {
        $this->client = new StatsWidgetsClient();
    }
}