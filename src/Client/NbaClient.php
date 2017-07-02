<?php

namespace JasonRoman\NbaApi\Client;

use Doctrine\Common\Annotations\AnnotationRegistry;
use GuzzleHttp\Client as GuzzleClient;
use JasonRoman\NbaApi\Request\ApiRequestInterface;
use JasonRoman\NbaApi\Request\AbstractNbaRequest ;
use JasonRoman\NbaApi\Request\Data\FullPlayByPlay;
use JasonRoman\NbaApi\Request\Data\FullPlayByPlayRequest;
use JasonRoman\NbaApi\Request\Nba\VideoRequest;
use Psr\Http\Message\ResponseInterface;
use Symfony\Component\Validator\Validation;

class NbaClient extends AbstractApiClient
{
    const BASE_URI = 'http://www.nba.com';

    const HEADERS = [
        'Origin' => 'http://www.nba.net',
        'Host'   => 'www.nba.net',
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
     * @param AbstractNbaRequest $request
     * @param array $config
     * @return ResponseInterface|null
     */
    public function request(AbstractNbaRequest $request, array $config = [])
    {
        return parent::doRequest($request, $config);
    }

    /**
     * @param VideoRequest $request
     * @param array $config
     * @return ResponseInterface|null
     */
    public function getVideo(VideoRequest $request, array $config = [])
    {
        return $this->request($request, $config);
    }
}