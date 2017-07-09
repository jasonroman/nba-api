<?php

namespace JasonRoman\NbaApi\Request\Data\MobileTeams\Playoffs;

use Symfony\Component\Validator\Constraints as Assert;
use JasonRoman\NbaApi\Request\AbstractDataRequest;
use JasonRoman\NbaApi\Params\Data\LeagueSlugParam;
use JasonRoman\NbaApi\Params\Data\TeamSlugParam;
use JasonRoman\NbaApi\Params\FormatParam;

/**
 * Get the playoff bracket and game scores. for the given league and season. Seems to just work with NBA for now.
 */
class PlayoffBracketRequest extends AbstractDataRequest
{
    const ENDPOINT = '/v2015/{format}/mobile_teams/{leagueSlug}/{year}/scores/{leagueId}_playoff_bracket.{format}';

    /**
     * @Assert\NotBlank()
     * @Assert\Type("string")
     * @ApiAssert\ApiChoice(FormatParam::OPTIONS)
     *
     * @var string
     */
    public $format;

    /**
     * @Assert\NotBlank()
     * @Assert\Type("string")
     * @ApiAssert\ApiChoice(LeagueSlugParam::OPTIONS)
     *
     * @var string
     */
    public $leagueSlug;

    /**
     * @Assert\NotBlank()
     * @Assert\Type("int")
     * @Assert\Range(min = 2014)
     *
     * @var int
     */
    public $year;

    /**
     * @Assert\NotBlank()
     * @Assert\Type("string")
     * @ApiAssert\ApiChoice(LeagueIdParam::OPTIONS)
     *
     * @var string
     */
    public $leagueId;
}