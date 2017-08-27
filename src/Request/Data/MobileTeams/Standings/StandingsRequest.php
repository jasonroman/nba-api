<?php

namespace JasonRoman\NbaApi\Request\Data\MobileTeams\Standings;

use Symfony\Component\Validator\Constraints as Assert;
use JasonRoman\NbaApi\Request\AbstractDataRequest;

/**
 * Get the standings of the pre-season or regular-season.
 */
class StandingsRequest extends AbstractDataRequest
{
    const ENDPOINT =
        '/v2015/{format}/mobile_teams/{leagueSlug}/{year}/scores/{leagueId}_standings_{seasonTypeCode}.{format}';

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
     * @Assert\Range(min = 2015)
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

    /**
     * @Assert\NotBlank()
     * @Assert\Type("string")
     * @ApiAssert\ApiChoice(SeasonTypeCodeParam::OPTIONS)
     *
     * @var string
     */
    public $seasonTypeCode;
}