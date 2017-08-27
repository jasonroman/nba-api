<?php

namespace JasonRoman\NbaApi\Tests\Integration\Client;

use JasonRoman\NbaApi\Client\ApiLeagueClient;

class ApiLeagueClientTest extends BaseClientTestCase
{
    const DEFAULT_PARAMS = [
        'articleId'    => '931b388a-eee6-4f0b-bfaf-d1ad77253117',
        'collectionId' => '47b76848-028b-4536-9c9c-37379d209639',
        'games'        => parent::DEFAULT_PARAMS['gameId'],
    ];

    /**
     * @var DataBiosClient
     */
    protected $client;

    /**
     * {@inheritdoc}
     */
    protected function setUp()
    {
        $this->client = new ApiLeagueClient();
    }

    /**
     * {@inheritdoc}
     */
    protected function getDefaultParams() : array
    {
        return array_merge(self::DEFAULT_PARAMS, static::DEFAULT_PARAMS);
    }
}