<?php

namespace JasonRoman\NbaApi\Tests\Integration\Client\Data;

use JasonRoman\NbaApi\Client\Data\DataGameExperienceClient;
use JasonRoman\NbaApi\Tests\Integration\Client\BaseClientTestCase;

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