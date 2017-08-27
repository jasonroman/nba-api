<?php

namespace JasonRoman\NbaApi\Tests\Integration\Client;

use JasonRoman\NbaApi\Client\DataBiosClient;

class DataBiosClientTest extends BaseClientTestCase
{
    /**
     * @var DataBiosClient
     */
    protected $client;

    /**
     * {@inheritdoc}
     */
    protected function setUp()
    {
        $this->client = new DataBiosClient();
    }
}