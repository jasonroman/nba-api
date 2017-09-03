<?php

namespace JasonRoman\NbaApi\Client\Data;

use JasonRoman\NbaApi\Request\Data\Bios\AbstractDataBiosRequest;
use JasonRoman\NbaApi\Request\Data\Bios\Player\PlayerBioRequest;
use JasonRoman\NbaApi\Request\NbaApiRequestInterface;
use JasonRoman\NbaApi\Response\NbaApiResponse;

/**
 * Client that accesses data.nba.com and endpoints which contain /bios in them.
 * Listed are the series of all possible Data\Bios requests.
 */
class DataBiosClient extends AbstractDataClient
{
    /**
     * {@inheritdoc}
     */
    public static function getClientId(): string
    {
        return 'data.bios';
    }

    /**
     * {@inheritdoc}
     * @throws \InvalidArgumentException if request is not the proper type
     */
    public function request(NbaApiRequestInterface $request, array $config = []): NbaApiResponse
    {
        if (!$request instanceof AbstractDataBiosRequest) {
            throw new \InvalidArgumentException('Request must be of type AbstractDataBiosRequest');
        }

        // the query string contains from all of the request parameters
        return parent::request($request, $config);
    }

    /**
     * @param PlayerBioRequest $request
     * @param array $config
     * @return NbaApiResponse
     */
    public function getPlayerBio(PlayerBioRequest $request, array $config = [])
    {
        return $this->request($request, $config);
    }
}