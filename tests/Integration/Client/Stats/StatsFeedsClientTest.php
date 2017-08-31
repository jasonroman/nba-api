<?php

namespace JasonRoman\NbaApi\Tests\Integration\Client\Stats;

use JasonRoman\NbaApi\Client\Stats\StatsFeedsClient;
use JasonRoman\NbaApi\Tests\Integration\Client\BaseClientTestCase;

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