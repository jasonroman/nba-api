<?php

namespace JasonRoman\NbaApi\Client;

use JasonRoman\NbaApi\Client\Api\ApiLeagueClient;

/**
 * Main Client for ease of use; essentially allows a single client to be used instead of creating
 * the drilled-down client for whatever individual request is being retrieved.
 *
 * @todo decide whether to keep this class
 */
class Client
{
    /**
     * @var ApiLeagueClient
     */
    private $apiLeagueClient;

    public function getApiClient()
    {
        if (!$this->apiClient) {
            $this->apiLeagueClient = new ApiLeagueClient();
        }

        return $this->apiLeagueClient;
    }
}