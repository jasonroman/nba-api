<?php

namespace JasonRoman\NbaApi\Tests\Integration\Client;

use JasonRoman\NbaApi\Client\DataGameExperienceClient;

class DataGameExperienceClientTest extends BaseClientTestCase
{
    /**
     * @var DataGameExperienceClient
     */
    protected $client;

    /**
     * {@inheritdoc}
     */
    protected function setUp()
    {
        $this->client = new DataGameExperienceClient();
    }
}