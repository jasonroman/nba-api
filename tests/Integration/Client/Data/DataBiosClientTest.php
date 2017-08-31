<?php

namespace JasonRoman\NbaApi\Tests\Integration\Client\Data;

use JasonRoman\NbaApi\Client\Data\DataBiosClient;
use JasonRoman\NbaApi\Tests\Integration\Client\BaseClientTestCase;

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