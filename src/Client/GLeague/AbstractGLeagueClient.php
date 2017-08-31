<?php

namespace JasonRoman\NbaApi\Client\GLeague;

use JasonRoman\NbaApi\Client\AbstractClient;
use JasonRoman\NbaApi\Request\GLeague\AbstractGLeagueRequest;
use JasonRoman\NbaApi\Request\NbaApiRequestInterface;

abstract class AbstractGLeagueClient extends AbstractClient
{
    const PROTOCOL    = 'http://';
    const BASE_DOMAIN = 'gleague.nba.com';
    const BASE_URI    = self::PROTOCOL.self::BASE_DOMAIN;

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
        return self::DEFAULT_HEADERS;
    }

    /**
     * {@inheritdoc}
     * @throws \InvalidArgumentException if request is not the proper type
     */
    public function request(NbaApiRequestInterface $request, array $config = [])
    {
        if (!$request instanceof AbstractGLeagueRequest) {
            throw new \InvalidArgumentException('Request must be of type AbstractGLeagueRequest');
        }

        // get the base URI, which could differ from the standard class base URI
        $config['base_uri'] = $this->getBaseUri($request);

        // the query string contains from all of the request parameters
        return parent::request($request, $config);
    }

    /**
     * Some requests can be team-specific and load the endpoint in a subdomain; handle that here.
     * For example, see the following two endpoints.
     *  - The first will perform the request for all teams.
     *  - The second will perform the request but just for the Grand Rapids Drive.
     *
     * 1. http://gleague.nba.com/wp-json/api/v1/assignments.json
     * 2. http://grandrapids.gleague.nba.com/wp-json/api/v1/assignments.json?recalled=1Season=2016-17&TeamID=1612709917
     *
     * @param AbstractGLeagueRequest $request
     * @return mixed|string
     */
    private function getBaseUri(AbstractGLeagueRequest $request)
    {
        // if subdomain slug exists
        if (property_exists($request, 'subdomainTeamSlug')) {
            return self::PROTOCOL.$request->subdomainTeamSlug.'.'.self::BASE_DOMAIN;
        }

        return self::CONFIG['base_uri'];
    }
}