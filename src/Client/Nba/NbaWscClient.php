<?php

namespace JasonRoman\NbaApi\Client\Nba;

use JasonRoman\NbaApi\Request\Nba\Wsc\AbstractNbaWscRequest;
use JasonRoman\NbaApi\Request\Nba\Wsc\Video\VideoRequest;
use JasonRoman\NbaApi\Request\NbaApiRequestInterface;
use JasonRoman\NbaApi\Response\NbaApiResponse;

/**
 * Client that accesses data.nba.com and endpoints which contain /wsc in them.
 * Listed are the series of all possible Nba\Wsc requests.
 */
class NbaWscClient extends AbstractNbaClient
{
    /**
     * {@inheritdoc}
     * @throws \InvalidArgumentException if request is not the proper type
     */
    public function request(NbaApiRequestInterface $request, array $config = [])
    {
        if (!$request instanceof AbstractNbaWscRequest) {
            throw new \InvalidArgumentException('Request must be of type AbstractNbaWscRequest');
        }

        return parent::request($request, $config);
    }

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