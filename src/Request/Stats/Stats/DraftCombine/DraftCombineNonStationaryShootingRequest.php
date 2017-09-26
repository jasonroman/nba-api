<?php

namespace JasonRoman\NbaApi\Request\Stats\Stats\DraftCombine;

use JasonRoman\NbaApi\Constraints as ApiAssert;
use JasonRoman\NbaApi\Params\LeagueIdParam;
use JasonRoman\NbaApi\Params\SeasonParam;
use JasonRoman\NbaApi\Request\Stats\Stats\AbstractStatsStatsRequest;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Draft combine non-stationary shooting. WNBA/G-League is supported, but currently only NBA returns results.
 */
class DraftCombineNonStationaryShootingRequest extends AbstractStatsStatsRequest
{
    const ENDPOINT = '/stats/draftcombinenonstationaryshooting';

    /**
     * @Assert\NotBlank()
     * @Assert\Type("string")
     * @ApiAssert\ApiChoice(LeagueIdParam::OPTIONS_NBA_WNBA_G_LEAGUE)
     *
     * @var string
     */
    public $leagueId;

    /**
     * @Assert\NotBlank()
     * @Assert\Type("string")
     * @ApiAssert\ApiRegex(SeasonParam::FORMAT)
     *
     * @var string
     */
    public $seasonYear;
}