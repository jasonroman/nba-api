<?php

namespace JasonRoman\NbaApi\Request\Stats\Stats\Stats;

use JasonRoman\NbaApi\Constraints as ApiAssert;
use JasonRoman\NbaApi\Params\LeagueIdParam;
use JasonRoman\NbaApi\Params\SeasonParam;
use JasonRoman\NbaApi\Params\SeasonYearParam;
use JasonRoman\NbaApi\Params\Stats\ConferenceParam;
use JasonRoman\NbaApi\Params\Stats\DivisionParam;
use JasonRoman\NbaApi\Params\Stats\DraftPickParam;
use JasonRoman\NbaApi\Params\Stats\GameScopeParam;
use JasonRoman\NbaApi\Params\Stats\HeightParam;
use JasonRoman\NbaApi\Params\Stats\LastNGamesParam;
use JasonRoman\NbaApi\Params\Stats\LocationParam;
use JasonRoman\NbaApi\Params\Stats\MonthParam;
use JasonRoman\NbaApi\Params\Stats\OutcomeParam;
use JasonRoman\NbaApi\Params\Stats\PerModeParam;
use JasonRoman\NbaApi\Params\Stats\PlayerExperienceParam;
use JasonRoman\NbaApi\Params\Stats\PlayerPositionParam;
use JasonRoman\NbaApi\Params\Stats\PoRoundParam;
use JasonRoman\NbaApi\Params\Stats\SeasonSegmentParam;
use JasonRoman\NbaApi\Params\Stats\SeasonTypeParam;
use JasonRoman\NbaApi\Params\Stats\StarterBenchParam;
use JasonRoman\NbaApi\Params\Stats\WeightParam;
use JasonRoman\NbaApi\Params\TeamIdParam;
use JasonRoman\NbaApi\Request\Stats\Stats\AbstractStatsStatsRequest;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Get the count of assists given particular criteria. All values are optional.
 * This endpoint seems pretty pointless, and if no values are specified, I cannot figure out what the defaults are.
 * There is a State Farm Assist Tracker on the NBA homepage, but it does not call this endpoint.
 */
class AssistTrackerStatsRequest extends AbstractStatsStatsRequest
{
    const ENDPOINT = '/stats/assisttracker';

    /**
     * @Assert\Type("string")
     * @ApiAssert\ApiChoice(LeagueIdParam::OPTIONS_NBA_G_LEAGUE)
     *
     * @var string
     */
    public $leagueId;

    /**
     * @Assert\Type("string")
     * @ApiAssert\ApiRegex(SeasonParam::FORMAT)
     *
     * @var string
     */
    public $season;

    /**
     * @Assert\Type("string")
     * @ApiAssert\ApiChoice(SeasonTypeParam::OPTIONS_WITH_ALL_STAR)
     *
     * @var string
     */
    public $seasonType;

    /**
     * @Assert\Type("string")
     * @ApiAssert\ApiChoice(PerModeParam::OPTIONS_TOTALS_PER_GAME)
     *
     * @var string
     */
    public $perMode;

    /**
     * @Assert\Type("int")
     * @Assert\Range(min = PoRoundParam::MIN_ALL, max = PoRoundParam::MAX)
     *
     * @var string
     */
    public $poRound;

    /**
     * @Assert\Type("string")
     * @ApiAssert\ApiChoice(OutcomeParam::OPTIONS)
     *
     * @var string
     */
    public $outcome;

    /**
     * @Assert\Type("string")
     * @ApiAssert\ApiChoice(LocationParam::OPTIONS)
     *
     * @var string
     */
    public $location;

    /**
     * @Assert\Type("int")
     * @Assert\Range(min = MonthParam::MIN_ALL, max = MonthParam::MAX)
     *
     * @var int
     */
    public $month;

    /**
     * @Assert\Type("string")
     * @ApiAssert\ApiChoice(SeasonSegmentParam::OPTIONS)
     *
     * @var string
     */
    public $seasonSegment;

    /**
     * @Assert\Type("\DateTime")
     *
     * @var \DateTime
     */
    public $dateFrom;

    /**
     * @Assert\Type("\DateTime")
     *
     * @var \DateTime
     */
    public $dateTo;

    /**
     * @Assert\Type("int")
     * @Assert\Range(min = TeamIdParam::MIN, max = TeamIdParam::MAX)
     *
     * @var int
     */
    public $teamId;

    /**
     * @Assert\Type("int")
     * @Assert\Range(min = TeamIdParam::MIN_ALL, max = TeamIdParam::MAX)
     *
     * @var int
     */
    public $opponentTeamId;

    /**
     * @Assert\Type("string")
     * @ApiAssert\ApiChoice(ConferenceParam::OPTIONS)
     *
     * @var string
     */
    public $conference;

    /**
     * @Assert\Type("string")
     * @ApiAssert\ApiChoice(ConferenceParam::OPTIONS)
     *
     * @var string
     */
    public $vsConference;

    /**
     * @Assert\Type("string")
     * @ApiAssert\ApiChoice(DivisionParam::OPTIONS)
     *
     * @var string
     */
    public $division;

    /**
     * @Assert\Type("string")
     * @ApiAssert\ApiChoice(DivisionParam::OPTIONS_WITH_CONFERENCE)
     *
     * @var string
     */
    public $vsDivision;

    /**
     * @Assert\Type("string")
     * @ApiAssert\ApiChoice(GameScopeParam::OPTIONS_LAST_10_YESTERDAY)
     *
     * @var string
     */
    public $gameScope;

    /**
     * @Assert\Type("string")
     * @ApiAssert\ApiChoice(PlayerExperienceParam::OPTIONS)
     *
     * @var string
     */
    public $playerExperience;

    /**
     * @Assert\Type("string")
     * @ApiAssert\ApiChoice(PlayerPositionParam::OPTIONS)
     *
     * @var string
     */
    public $playerPosition;

    /**
     * @Assert\Type("string")
     * @ApiAssert\ApiChoice(StarterBenchParam::OPTIONS)
     *
     * @var string
     */
    public $starterBench;

    /**
     * @Assert\Type("int")
     * @Assert\Range(min = LastNGamesParam::MIN_ALL, max = LastNGamesParam::MAX)
     *
     * @var int
     */
    public $lastNGames;

    /**
     * @Assert\Type("int")
     * @Assert\Range(min = SeasonYearParam::FIRST_DRAFT_SEASON_YEAR)
     *
     * @var int
     */
    public $draftYear;

    /**
     * @Assert\Type("string")
     * @ApiAssert\ApiChoice(DraftPickParam::OPTIONS)
     *
     * @var string
     */
    public $draftPick;

    /**
     * @Assert\Type("string")
     *
     * @var string
     */
    public $college;

    /**
     * @Assert\Type("string")
     *
     * @var string
     */
    public $country;

    /**
     * @Assert\Type("string")
     * @ApiAssert\ApiChoice(HeightParam::OPTIONS)
     *
     * @var string
     */
    public $height;

    /**
     * @Assert\Type("string")
     * @ApiAssert\ApiChoice(WeightParam::OPTIONS)
     *
     * @var string
     */
    public $weight;
}