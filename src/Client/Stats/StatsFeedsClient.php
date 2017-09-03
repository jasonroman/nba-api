<?php

namespace JasonRoman\NbaApi\Client\Stats;

use JasonRoman\NbaApi\Request\NbaApiRequestInterface;
use JasonRoman\NbaApi\Request\Stats\Feeds\AbstractStatsFeedsRequest;
use JasonRoman\NbaApi\Request\Stats\Feeds\Team\TeamProfileRequest;
use JasonRoman\NbaApi\Request\Stats\Feeds\Transactions\PlayerTransactions2012To2015Request;
use JasonRoman\NbaApi\Response\NbaApiResponse;

/**
 * Client that accesses stats.nba.com and endpoints which contain /feeds in them.
 * Listed are the series of all possible Stats\Feeds requests.
 */
class StatsFeedsClient extends AbstractStatsClient
{
    /**
     * {@inheritdoc}
     */
    public static function getClientId(): string
    {
        return 'stats.feeds';
    }

    /**
     * {@inheritdoc}
     * @throws \InvalidArgumentException if request is not the proper type
     */
    public function request(NbaApiRequestInterface $request, array $config = []): NbaApiResponse
    {
        if (!$request instanceof AbstractStatsFeedsRequest) {
            throw new \InvalidArgumentException('Request must be of type AbstractStatsFeedsRequest');
        }

        // the query string contains from all of the request parameters
        return parent::request($request, $config);
    }

    /**
     * @param TeamProfileRequest $request
     * @param array $config
     * @return NbaApiResponse
     */
    public function getTeamProfile(TeamProfileRequest $request, array $config = [])
    {
        return $this->request($request, $config);
    }

    /**
     * @param PlayerTransactions2012To2015Request $request
     * @param array $config
     * @return NbaApiResponse
     */
    public function getPlayerTransactions2012To2015(PlayerTransactions2012To2015Request $request, array $config = [])
    {
        return $this->request($request, $config);
    }
}