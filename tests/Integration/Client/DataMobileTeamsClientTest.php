<?php

namespace JasonRoman\NbaApi\Tests\Integration\Client;

use JasonRoman\NbaApi\Client\DataMobileTeamsClient;
use JasonRoman\NbaApi\Params\Data\MonthNumParam;
use JasonRoman\NbaApi\Params\Data\SeasonTypeCodeParam;

class DataMobileTeamsClientTest extends BaseClientTestCase
{
    const DEFAULT_PARAMS = [
        'seasonTypeCode' => SeasonTypeCodeParam::REGULAR_SEASON,
        'monthNum'       => MonthNumParam::JAN,
    ];

    /**
     * @var DataMobileTeamsClient
     */
    protected $client;

    /**
     * {@inheritdoc}
     */
    protected function setUp()
    {
        $this->client = new DataMobileTeamsClient();
    }
}