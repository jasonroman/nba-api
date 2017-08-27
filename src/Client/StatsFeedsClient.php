<?php

namespace JasonRoman\NbaApi\Client;

use JasonRoman\NbaApi\Request\Stats\Feeds\Team\PlayerTransactions2012To2015Request;
use JasonRoman\NbaApi\Request\Stats\Feeds\Team\TeamProfileRequest;
use JasonRoman\NbaApi\Response\NbaApiResponseInterface;

/**
 * Client that accesses stats.nba.com and endpoints which contain /feeds in them.
 * Listed are the series of all possible Stats\Feeds requests.
 */
class StatsFeedsClient extends AbstractStatsClient
{
    /**
     * @param TeamProfileRequest $request
     * @param array $config
     * @return NbaApiResponseInterface
     */
    public function getTeamProfile(TeamProfileRequest $request, array $config = [])
    {
        return $this->request($request, $config);
    }

    /**
     * @param PlayerTransactions2012To2015Request $request
     * @param array $config
     * @return NbaApiResponseInterface
     */
    public function getPlayerTransactions2012To2015(PlayerTransactions2012To2015Request $request, array $config = [])
    {
        return $this->request($request, $config);
    }
}