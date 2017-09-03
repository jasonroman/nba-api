<?php

namespace JasonRoman\NbaApi\Client\StatsProd;

use JasonRoman\NbaApi\Request\NbaApiRequestInterface;
use JasonRoman\NbaApi\Request\StatsProd\StatsCms\AbstractStatsProdStatsCmsRequest;
use JasonRoman\NbaApi\Request\StatsProd\StatsCms\Homepage\HomepageRequest;
use JasonRoman\NbaApi\Request\StatsProd\StatsCms\Players\SynergyPlayersPlayTypeStatsRequest;
use JasonRoman\NbaApi\Request\StatsProd\StatsCms\Players\SynergyTeamsPlayTypeStatsRequest;
use JasonRoman\NbaApi\Request\StatsProd\StatsCms\Rotowire\RotowirePlayerRequest;
use JasonRoman\NbaApi\Request\StatsProd\StatsCms\Rotowire\RotowirePlayersRequest;
use JasonRoman\NbaApi\Response\NbaApiResponse;

/**
 * Client that accesses stats-prod.nba.com and endpoints which contain /statscms in them.
 * Listed are the series of all possible StatsProd\StatsCms requests.
 */
class StatsProdStatsCmsClient extends AbstractStatsProdClient
{
    /**
     * {@inheritdoc}
     */
    public static function getClientId(): string
    {
        return 'stats_prod.stats_cms';
    }

    /**
     * {@inheritdoc}
     * @throws \InvalidArgumentException if request is not the proper type
     */
    public function request(NbaApiRequestInterface $request, array $config = []): NbaApiResponse
    {
        if (!$request instanceof AbstractStatsProdStatsCmsRequest) {
            throw new \InvalidArgumentException('Request must be of type AbstractStatsProdStatsCmsRequest');
        }

        // the query string contains from all of the request parameters
        return parent::request($request, $config);
    }

    /**
     * @param HomepageRequest $request
     * @param array $config
     * @return NbaApiResponse
     */
    public function getHomepage(HomepageRequest $request, array $config = [])
    {
        return $this->request($request, $config);
    }

    /**
     * @param SynergyPlayersPlayTypeStatsRequest $request
     * @param array $config
     * @return NbaApiResponse
     */
    public function getSynergyPlayersPlayTypeStats(SynergyPlayersPlayTypeStatsRequest $request, array $config = [])
    {
        return $this->request($request, $config);
    }

    /**
     * @param SynergyTeamsPlayTypeStatsRequest $request
     * @param array $config
     * @return NbaApiResponse
     */
    public function getSynergyTeamsPlayTypeStats(SynergyTeamsPlayTypeStatsRequest $request, array $config = [])
    {
        return $this->request($request, $config);
    }

    /**
     * @param RotowirePlayerRequest $request
     * @param array $config
     * @return NbaApiResponse
     */
    public function getRotowirePlayer(RotowirePlayerRequest $request, array $config = [])
    {
        return $this->request($request, $config);
    }

    /**
     * @param RotowirePlayersRequest $request
     * @param array $config
     * @return NbaApiResponse
     */
    public function getRotowirePlayers(RotowirePlayersRequest $request, array $config = [])
    {
        return $this->request($request, array_merge(['timeout' => 30], $config));
    }
}