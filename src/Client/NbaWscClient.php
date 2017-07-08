<?php

namespace JasonRoman\NbaApi\Client;

use JasonRoman\NbaApi\Request\Nba\Wsc\Video\ArticleRequest;
use JasonRoman\NbaApi\Response\NbaApiResponseInterface;

/**
 * Client that accesses data.nba.com and endpoints which contain /wsc in them.
 * Listed are the series of all possible Nba\Wsc requests.
 */
class NbaWscClient extends AbstractNbaClient
{
    /**
     * @param ArticleRequest $request
     * @param array $config
     * @return NbaApiResponseInterface
     */
    public function getVideo(ArticleRequest $request, array $config = [])
    {
        return $this->request($request, $config);
    }
}