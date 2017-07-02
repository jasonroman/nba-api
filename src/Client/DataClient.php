<?php

namespace JasonRoman\NbaApi\Client;

use Psr\Http\Message\ResponseInterface;
use JasonRoman\NbaApi\Request\AbstractDataRequest;
use JasonRoman\NbaApi\Request\Data\AbstractStatsApiRequest;
use JasonRoman\NbaApi\Request\Data\MobileTeams\Game\FullPlayByPlayRequest;
use JasonRoman\NbaApi\Request\Data\Prod\Game\BoxscoreRequest;
use JasonRoman\NbaApi\Response\ApiResponse;

class DataClient extends AbstractApiClient
{
    // it appears data.nba.com could also be used;
    const BASE_URI = 'http://data.nba.net/';

    const HEADERS = [
        'Origin' => 'http://data.nba.net',
        'Host'   => 'data.nba.net',
    ];

    const CONFIG = [
        'base_uri'        => self::BASE_URI,
        'timeout'         => self::TIMEOUT,
        'connect_timeout' => self::CONNECT_TIMEOUT,
    ];

    /**
     * {@inheritdoc}
     */
    protected function getHeaders()
    {
        return array_merge(self::DEFAULT_HEADERS, self::HEADERS);
    }

    /**
     * @param AbstractDataRequest $request
     * @param array $config
     * @return ResponseInterface|null
     */
    public function request(AbstractDataRequest $request, array $config = [])
    {
        return parent::doRequest($request, $config);
    }

    /**
     * Following is a series of all the possible Data-type requests. This could have been done via
     * magic methods, but this is easier to enforce typehints and also IDE auto-completing.
     */

    /**
     * @param BoxscoreRequest $request
     * @param array $config
     * @return ResponseInterface|null
     */
    public function getBoxscore(BoxscoreRequest $request, array $config = [])
    {
        return $this->request($request, $config);
    }

    /**
     * @param FullPlayByPlayRequest $request
     * @param array $config
     * @return ApiResponse|null
     */
    public function getFullPlayByPlay(FullPlayByPlayRequest $request, array $config = [])
    {
        return $this->request($request, $config);
    }
}