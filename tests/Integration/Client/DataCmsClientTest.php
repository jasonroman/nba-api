<?php

namespace JasonRoman\NbaApi\Tests\Integration\Client;

use JasonRoman\NbaApi\Client\DataCmsClient;
use JasonRoman\NbaApi\Params\Data\SummerLeagueAbbrevParam;
use JasonRoman\NbaApi\Params\Stats\PeriodParam;

class DataCmsClientTest extends BaseClientTestCase
{
    const DEFAULT_PARAMS = [
        'period'             => PeriodParam::MIN,
        'summerLeagueAbbrev' => SummerLeagueAbbrevParam::ORLANDO,
    ];

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