<?php

namespace JasonRoman\NbaApi\Tests\Integration\Client;

use JasonRoman\NbaApi\Client\StatsWidgetClient;

class StatsWidgetClientTest extends BaseClientTestCase
{
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