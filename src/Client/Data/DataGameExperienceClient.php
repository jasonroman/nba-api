<?php

namespace JasonRoman\NbaApi\Client\Data;

use JasonRoman\NbaApi\Request\Data\GameExperience\General\BrandsRequest;
use JasonRoman\NbaApi\Request\Data\GameExperience\Team\TeamCoverItLiveRequest;
use JasonRoman\NbaApi\Request\Data\GameExperience\Team\TeamDefaultRequest;
use JasonRoman\NbaApi\Response\NbaApiResponse;

/**
 * Client that accesses data.nba.com and endpoints which contain /ge in them.
 * Listed are the series of all possible Data\GameExperience requests.
 */
class DataGameExperienceClient extends AbstractDataClient
{
    /**
     * @param BrandsRequest $request
     * @param array $config
     * @return NbaApiResponse
     */
    public function getBrands(BrandsRequest $request, array $config = [])
    {
        return $this->request($request, $config);
    }

    /**
     * @param TeamCoverItLiveRequest $request
     * @param array $config
     * @return NbaApiResponse
     */
    public function getTeamCoverItLive(TeamCoverItLiveRequest $request, array $config = [])
    {
        return $this->request($request, $config);
    }

    /**
     * @param TeamDefaultRequest $request
     * @param array $config
     * @return NbaApiResponse
     */
    public function getTeamDefault(TeamDefaultRequest $request, array $config = [])
    {
        return $this->request($request, $config);
    }
}