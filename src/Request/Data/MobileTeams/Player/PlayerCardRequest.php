<?php

namespace JasonRoman\NbaApi\Request\Data\MobileTeams\Scores;

use Symfony\Component\Validator\Constraints as Assert;
use JasonRoman\NbaApi\Constraints as ApiAssert;
use JasonRoman\NbaApi\Params\Data\LeagueSlugParam;
use JasonRoman\NbaApi\Params\Data\SeasonTypeCodeParam;
use JasonRoman\NbaApi\Params\FormatParam;
use JasonRoman\NbaApi\Request\AbstractDataRequest;

/**
 * Get the player card for a given season/season type (pre/regular/playoffs).
 */
class PlayerCardRequest extends AbstractDataRequest
{
    const ENDPOINT = '/data/v2015/{format}/mobile_teams/{leagueSlug}/{year}/players/playercard_{playerId}_{seasonTypeCode}.{format}';

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
     * @Assert\Type("int")
     * @Assert\Range(min = 1, max = 2147483647)
     *
     * @var int
     */
    public $playerId;

    /**
     * @Assert\NotBlank()
     * @Assert\Type("string")
     * @ApiAssert\ApiChoice(SeasonTypeCodeParam::OPTIONS)
     *
     * @var string
     */
    public $seasonTypeCode;
}