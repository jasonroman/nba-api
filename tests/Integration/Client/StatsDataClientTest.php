<?php

namespace JasonRoman\NbaApi\Tests\Integration\Client;

use JasonRoman\NbaApi\Client\StatsDataClient;

class StatsDataClientTest extends BaseClientTestCase
{
    const DEFAULT_PARAMS = [
        'year' => 2015,
    ];

    /**
     * @var StatsDataClient
     */
    protected $client;

    /**
     * {@inheritdoc}
     */
    protected function setUp()
    {
        $this->client = new StatsDataClient();
    }
}