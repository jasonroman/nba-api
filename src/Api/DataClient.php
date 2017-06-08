<?php

namespace JasonRoman\NbaApi\Api;

use GuzzleHttp\Client as GuzzleClient;
use JasonRoman\NbaApi\Request\Data\AbstractDataApiRequest;
use JasonRoman\NbaApi\Request\Data\AbstractStatsApiRequest;
use JasonRoman\NbaApi\Request\Data\FullPlayByPlay;
use Psr\Http\Message\ResponseInterface;

class DataClient extends AbstractApiClient
{
    const BASE_URI = 'http://data.nba.com/data/';

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
     * @param array $config
     */
    public function __construct(array $config = [])
    {
        parent::__construct(new GuzzleClient(array_merge(
            self::CONFIG,
            ['headers' => $this->getHeaders()],
            $config
        )));
    }

    /**
     * {@inheritdoc}
     */
    protected function getHeaders()
    {
        return array_merge(self::DEFAULT_HEADERS, self::HEADERS);
    }

    /**
     * @param AbstractDataApiRequest $request
     * @param array $config
     * @return ResponseInterface|null
     */
    public function request(AbstractDataApiRequest $request, array $config = [])
    {
        return $this->apiRequest(
            'GET',
            $request->getEndpoint(),
            array_merge(
                ['query' => $request->toArray()],
                $config
            )
        );
    }

    /**
     * @param FullPlayByPlay $request
     * @param array $config
     * @return ResponseInterface|null
     */
    public function getFullPlayByPlay(FullPlayByPlay $request, array $config = [])
    {
        return $this->request($request, $config);
    }
}