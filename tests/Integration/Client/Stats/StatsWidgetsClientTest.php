<?php

namespace JasonRoman\NbaApi\Tests\Integration\Client\Stats;

use JasonRoman\NbaApi\Client\Stats\StatsWidgetsClient;
use JasonRoman\NbaApi\Tests\Integration\Client\BaseClientTestCase;

class StatsWidgetsClientTest extends BaseClientTestCase
{
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