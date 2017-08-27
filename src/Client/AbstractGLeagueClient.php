<?php

namespace JasonRoman\NbaApi\Client;

use JasonRoman\NbaApi\Request\AbstractGLeagueRequest;
use JasonRoman\NbaApi\Response\NbaApiResponseInterface;

abstract class AbstractGLeagueClient extends AbstractClient
{
    const BASE_URI = 'http://gleague.nba.com';

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
     * @param AbstractGLeagueRequest $request
     * @param array $config
     * @return NbaApiResponseInterface
     */
    public function request(AbstractGLeagueRequest $request, array $config = [])
    {
        // get the base URI, which could differ from the standard class base URI
        $config['base_uri'] = $this->getBaseUri($request);

        // the query string contains from all of the request parameters
        return parent::doRequest($request, array_merge(['query' => $request->toArray()], $config));
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
        //
        if (property_exists($request, 'subdomainSlug')) {
            return $request->subDomainSlug.'.'.self::CONFIG['base_uri'];
        }

        return self::CONFIG['base_uri'];
    }
}