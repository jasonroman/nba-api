<?php

namespace JasonRoman\NbaApi\Client;

use JasonRoman\NbaApi\Response\ApiResponse;
use JasonRoman\NbaApi\Request\Data\Cms\Game\BoxscoreRequest;
use JasonRoman\NbaApi\Request\Data\AbstractStatsApiRequest;

class DataCmsClient extends DataClient
{
    /**
     * Following is a series of all the possible Data\CMS requests.
     */

    /**
     * @param BoxscoreRequest $request
     * @param array $config
     * @return ApiResponse|null
     */
    public function getBoxscore(BoxscoreRequest $request, array $config = [])
    {
        return $this->request($request, $config);
    }
}