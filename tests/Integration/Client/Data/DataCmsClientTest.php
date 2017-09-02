<?php

namespace JasonRoman\NbaApi\Tests\Integration\Client\Data;

use JasonRoman\NbaApi\Client\Data\DataCmsClient;
use JasonRoman\NbaApi\Params\Data\SummerLeagueAbbrevParam;
use JasonRoman\NbaApi\Params\Stats\PeriodParam;
use JasonRoman\NbaApi\Tests\Integration\Client\BaseClientTestCase;

class DataCmsClientTest extends BaseClientTestCase
{
    /**
     * @var DataCmsClient
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