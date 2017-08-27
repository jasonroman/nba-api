<?php

namespace JasonRoman\NbaApi\Client;

use JasonRoman\NbaApi\Request\Data\Bios\Player\PlayerBioRequest;
use JasonRoman\NbaApi\Response\NbaApiResponseInterface;

/**
 * Client that accesses data.nba.com and endpoints which contain /bios in them.
 * Listed are the series of all possible Data\Bios requests.
 */
class DataBiosClient extends AbstractDataClient
{
    /**
     * @param PlayerBioRequest $request
     * @param array $config
     * @return NbaApiResponseInterface
     */
    public function getPlayerBio(PlayerBioRequest $request, array $config = [])
    {
        return $this->request($request, $config);
    }
}