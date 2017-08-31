<?php

namespace JasonRoman\NbaApi\Tests\Integration\Client\Stats;

use JasonRoman\NbaApi\Client\Stats\StatsDataClient;
use JasonRoman\NbaApi\Tests\Integration\Client\BaseClientTestCase;

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