<?php

namespace JasonRoman\NbaApi\Tests\Integration\Client;

use JasonRoman\NbaApi\Client\DataCmsClient;

class DataCmsClientTest extends BaseClientTestCase
{
    const DEFAULT_PARAMS = [
        'period' => 1,
    ];

    /**
     * @var DataBiosClient
     */
    protected $client;

    /**
     * {@inheritdoc}
     */
    protected function setUp()
    {
        $this->client = new DataCmsClient();
    }
}