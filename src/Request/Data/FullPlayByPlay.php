<?php

namespace JasonRoman\NbaApi\Request\Data;

class FullPlayByPlay extends AbstractDataApiRequest
{
    const ENDPOINT = '/10s/v2015/{format}/mobile_teams/nba/{season4DigitYear}/scores/pbp/{gameId}_full_pbp.{format}';

    /**
     * @var string
     */
    public $format = 'json';

    /**
     * @var int
     */
    public $season4DigitYear;

    /**
     * @var int
     */
    public $gameId;
}