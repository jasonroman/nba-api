<?php

namespace JasonRoman\NbaApi\Client;

use JasonRoman\NbaApi\Request\Nba\Wsc\Video\VideoRequest;
use JasonRoman\NbaApi\Response\NbaApiResponse;

/**
 * Client that accesses data.nba.com and endpoints which contain /wsc in them.
 * Listed are the series of all possible Nba\Wsc requests.
 */
class NbaWscClient extends AbstractNbaClient
{
    /**
     * @param VideoRequest $request
     * @param array $config
     * @return NbaApiResponse
     */
    public function getVideo(VideoRequest $request, array $config = [])
    {
        return $this->request($request, $config);
    }
}