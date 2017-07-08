<?php

namespace JasonRoman\NbaApi\Client;

use JasonRoman\NbaApi\Request\Data\Html\Game\GameBookRequest;
use JasonRoman\NbaApi\Response\NbaApiResponseInterface;

/**
 * Client that accesses data.nba.com and endpoints which contain /html in them.
 * Listed are the series of all possible Data\Html requests.
 */
class DataHtmlClient extends AbstractDataClient
{
    /**
     * @param GameBookRequest $request
     * @param array $config
     * @return NbaApiResponseInterface
     */
    public function getGameBook(GameBookRequest $request, array $config = [])
    {
        return $this->request($request, $config);
    }
}