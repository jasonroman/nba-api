<?php

namespace JasonRoman\NbaApi\Tests\Integration\Client;

use JasonRoman\NbaApi\Client\StatsProdStatsCmsClient;
use JasonRoman\NbaApi\Params\StatsProd\NamesParam;

class StatsProdStatsCmsClientTest extends BaseClientTestCase
{
    const DEFAULT_PARAMS = [
        'season' => 2015,//'videoId' => '087a6075-00fc-187d-3f9b-10023abe58a3',
        'names'  => NamesParam::OFFENSIVE,
    ];

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