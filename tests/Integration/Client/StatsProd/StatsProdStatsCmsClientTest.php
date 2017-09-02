<?php

namespace JasonRoman\NbaApi\Tests\Integration\Client\StatsProd;

use JasonRoman\NbaApi\Client\StatsProd\StatsProdStatsCmsClient;
use JasonRoman\NbaApi\Params\StatsProd\NamesParam;
use JasonRoman\NbaApi\Tests\Integration\Client\BaseClientTestCase;

class StatsProdStatsCmsClientTest extends BaseClientTestCase
{
    /**
     * @var StatsProdStatsCmsClient
     */
    protected $client;

    /**
     * {@inheritdoc}
     */
    protected function setUp()
    {
        $this->client = new StatsProdStatsCmsClient();
    }
}