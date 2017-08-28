<?php

namespace JasonRoman\NbaApi\Tests\Integration\Client;

use JasonRoman\NbaApi\Client\DataProdClient;
use JasonRoman\NbaApi\Client\GLeagueApiClient;
use JasonRoman\NbaApi\Params\Data\PlayoffSeriesIdParam;
use JasonRoman\NbaApi\Params\Stats\PeriodParam;
use JasonRoman\NbaApi\Params\TeamSlugParam;
use JasonRoman\NbaApi\Request\Data\Prod\Game\GameBookRequest;
use JasonRoman\NbaApi\Response\NbaApiResponse;

class GLeagueApiClientTest extends BaseClientTestCase
{
    const DEFAULT_PARAMS = [
        'subdomainTeamSlug' => TeamSlugParam::GRAND_RAPIDS_DRIVE,
    ];

    /**
     * @var GLeagueApiClient
     */
    protected $client;

    /**
     * {@inheritdoc}
     */
    protected function setUp()
    {
        $this->client = new GLeagueApiClient();
    }
}