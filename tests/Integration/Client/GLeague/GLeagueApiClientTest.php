<?php

namespace JasonRoman\NbaApi\Tests\Integration\Client\GLeague;

use JasonRoman\NbaApi\Client\GLeague\GLeagueApiClient;
use JasonRoman\NbaApi\Params\TeamSlugParam;
use JasonRoman\NbaApi\Tests\Integration\Client\BaseClientTestCase;

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