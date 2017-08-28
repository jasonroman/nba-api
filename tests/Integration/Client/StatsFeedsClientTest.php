<?php

namespace JasonRoman\NbaApi\Tests\Integration\Client;

use JasonRoman\NbaApi\Client\StatsFeedsClient;

class StatsFeedsClientTest extends BaseClientTestCase
{
    /**
     * @var StatsFeedsClient
     */
    protected $client;

    /**
     * {@inheritdoc}
     */
    protected function setUp()
    {
        $this->client = new StatsFeedsClient();
    }
}