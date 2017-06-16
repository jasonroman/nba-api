<?php

namespace JasonRoman\NbaApi\Request\Data;

class FullPlayByPlay extends AbstractDataApiRequest
{
    const ENDPOINT = '/10s/v2015/{format}/mobile_teams/nba/{year}/scores/pbp/{gameId}_full_pbp.{format}';

    /**
     * @var string
     */
    public $format;

    /**
     * @var int
     */
    public $year;

    /**
     * @var int
     */
    public $gameId;
}