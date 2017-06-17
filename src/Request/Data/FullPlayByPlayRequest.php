<?php

namespace JasonRoman\NbaApi\Request\Data;

use Symfony\Component\Validator\Constraints as Assert;
use JasonRoman\NbaApi\Constraints as ApiAssert;
use JasonRoman\NbaApi\Request\Data\Params\FormatParam;
use JasonRoman\NbaApi\Request\Params\GameIdParam;
use JasonRoman\NbaApi\Request\Params\YearParam;


class FullPlayByPlayRequest extends AbstractDataApiRequest
{
    const ENDPOINT = '/v2015/{format}/mobile_teams/nba/{year}/scores/pbp/{gameId}_full_pbp.{format}';

    /**
     * @ApiAssert\ApiChoice(choices = FormatParam::OPTIONS)
     * @var string // not sure what leagues, investigate
     */
    public $format;

    /**
     * @ApiAssert\ApiRegex(pattern = YearParam::FORMAT)
     * @var int
     */
    public $year;

    /**
     * @Assert\Regex(pattern = GameIdParam::FORMAT)
     * @var string
     */
    public $gameId;
}