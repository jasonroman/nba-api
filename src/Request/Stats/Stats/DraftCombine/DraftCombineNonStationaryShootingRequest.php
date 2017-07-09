<?php

namespace JasonRoman\NbaApi\Request\Stats\Stats\DraftCombine;

use Symfony\Component\Validator\Constraints as Assert;
use JasonRoman\NbaApi\Constraints as ApiAssert;
use JasonRoman\NbaApi\Params\LeagueIdParam;
use JasonRoman\NbaApi\Params\SeasonParam;
use JasonRoman\NbaApi\Request\AbstractStatsRequest;

/**
 * Draft combine non-stationary shooting. WNBA/G-League is supported, but currently only NBA returns results.
 */
class DraftCombineNonStationaryShootingRequest extends AbstractStatsRequest
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
     * @ApiAssert\ApiRegex(pattern = SeasonParam::FORMAT)
     *
     * @var string
     */
    public $seasonYear;
}