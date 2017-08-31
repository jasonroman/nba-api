<?php

namespace JasonRoman\NbaApi\Client\Api;

use JasonRoman\NbaApi\Request\Api\League\AbstractApiLeagueRequest;
use JasonRoman\NbaApi\Request\Api\League\News\ArticleRequest;
use JasonRoman\NbaApi\Request\Api\League\Video\VideoCollectionRequest;
use JasonRoman\NbaApi\Request\Api\League\Video\VideoRequest;
use JasonRoman\NbaApi\Request\NbaApiRequestInterface;
use JasonRoman\NbaApi\Response\NbaApiResponse;

/**
 * Client that accesses api.nba.net and endpoints which contain /league in them.
 * Listed are the series of all possible Api\League requests.
 */
class ApiLeagueClient extends AbstractApiClient
{
    /**
     * {@inheritdoc}
     * @throws \InvalidArgumentException if request is not the proper type
     */
    public function request(NbaApiRequestInterface $request, array $config = [])
    {
        if (!$request instanceof AbstractApiLeagueRequest) {
            throw new \InvalidArgumentException('Request must be of type AbstractApiLeagueRequest');
        }

        return parent::request($request, $config);
    }

    /**
     * @param ArticleRequest $request
     * @param array $config
     * @return NbaApiResponse
     */
    public function getArticle(ArticleRequest $request, array $config = [])
    {
        return $this->request($request, $config);
    }

    /**
     * @param VideoCollectionRequest $request
     * @param array $config
     * @return NbaApiResponse
     */
    public function getVideoCollection(VideoCollectionRequest $request, array $config = [])
    {
        return $this->request($request, $config);
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