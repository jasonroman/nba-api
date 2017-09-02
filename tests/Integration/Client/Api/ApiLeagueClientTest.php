<?php

namespace JasonRoman\NbaApi\Tests\Integration\Client\Api;

use JasonRoman\NbaApi\Client\Api\ApiLeagueClient;
use JasonRoman\NbaApi\Tests\Integration\Client\BaseClientTestCase;

class ApiLeagueClientTest extends BaseClientTestCase
{
    /**
     * @var ApiLeagueClient
     */
    protected $client;

    /**
     * {@inheritdoc}
     */
    protected function setUp()
    {
        $this->client = new ApiLeagueClient();
    }
}