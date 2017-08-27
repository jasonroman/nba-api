<?php

namespace JasonRoman\NbaApi\Client;

use JasonRoman\NbaApi\Request\GLeague\Api\Players\PlayerAssignmentsRequest;
use JasonRoman\NbaApi\Request\GLeague\Api\Team\TeamAssignmentsRequest;
use JasonRoman\NbaApi\Response\NbaApiResponse;

/**
 * Client that accesses gleague.nba.com and {teamSlug}.gleague.nba.com endpoints which contain /api in them.
 * Listed are the series of all possible GLeague\Api requests.
 */
class GLeagueApiClient extends AbstractGLeagueClient
{
    /**
     * @param PlayerAssignmentsRequest $request
     * @param array $config
     * @return NbaApiResponse
     */
    public function getPlayerAssignments(PlayerAssignmentsRequest $request, array $config = [])
    {
        return $this->request($request, $config);
    }

    /**
     * @param TeamAssignmentsRequest $request
     * @param array $config
     * @return NbaApiResponse
     */
    public function getTeamAssignments(TeamAssignmentsRequest $request, array $config = [])
    {
        return $this->request($request, $config);
    }
}