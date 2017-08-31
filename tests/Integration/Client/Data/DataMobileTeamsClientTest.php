<?php

namespace JasonRoman\NbaApi\Tests\Integration\Client\Data;

use JasonRoman\NbaApi\Client\Data\DataMobileTeamsClient;
use JasonRoman\NbaApi\Params\Data\MonthNumParam;
use JasonRoman\NbaApi\Params\Data\SeasonTypeCodeParam;
use JasonRoman\NbaApi\Tests\Integration\Client\BaseClientTestCase;

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