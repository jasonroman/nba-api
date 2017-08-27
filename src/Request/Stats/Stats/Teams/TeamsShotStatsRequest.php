<?php

namespace JasonRoman\NbaApi\Request\Stats\Stats\Teams;

use Symfony\Component\Validator\Constraints as Assert;
use JasonRoman\NbaApi\Constraints as ApiAssert;
use JasonRoman\NbaApi\Params\LeagueIdParam;
use JasonRoman\NbaApi\Params\Stats\PerModeParam;
use JasonRoman\NbaApi\Params\SeasonParam;
use JasonRoman\NbaApi\Params\Stats\ClosestDefenderDistanceParam;
use JasonRoman\NbaApi\Params\Stats\ConferenceParam;
use JasonRoman\NbaApi\Params\Stats\DivisionParam;
use JasonRoman\NbaApi\Params\Stats\DribbleRangeParam;
use JasonRoman\NbaApi\Params\Stats\GameSegmentParam;
use JasonRoman\NbaApi\Params\Stats\LastNGamesParam;
use JasonRoman\NbaApi\Params\Stats\LocationParam;
use JasonRoman\NbaApi\Params\Stats\MonthParam;
use JasonRoman\NbaApi\Params\Stats\OutcomeParam;
use JasonRoman\NbaApi\Params\Stats\PeriodParam;
use JasonRoman\NbaApi\Params\Stats\PORoundParam;
use JasonRoman\NbaApi\Params\Stats\SeasonSegmentParam;
use JasonRoman\NbaApi\Params\Stats\SeasonTypeParam;
use JasonRoman\NbaApi\Params\Stats\ShotClockRangeParam;
use JasonRoman\NbaApi\Params\Stats\ShotDistanceRangeParam;
use JasonRoman\NbaApi\Params\Stats\ShotRangeParam;
use JasonRoman\NbaApi\Params\Stats\TouchTimeRangeParam;
use JasonRoman\NbaApi\Params\TeamIdParam;
use JasonRoman\NbaApi\Request\AbstractDataRequest;

class TeamsShotStatsRequest extends AbstractDataRequest
{
    const ENDPOINT = '/stats/leaguedashteamptshot';

    /**
     * @Assert\NotBlank()
     * @Assert\Type("string")
     * @ApiAssert\ApiChoice(PerModeParam::OPTIONS_ALL)
     *
     * @var string
     */
    public $perMode;

    /**
     * @Assert\Type("string")
     * @ApiAssert\ApiRegex(pattern = LeagueIdParam::FORMAT)
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
    public $season;

    /**
     * @Assert\NotBlank()
     * @Assert\Type("string")
     * @ApiAssert\ApiChoice(SeasonTypeParam::OPTIONS_WITH_ALL_STAR)
     *
     * @var string
     */
    public $seasonType;

    /**
     * @Assert\Type("int")
     * @Assert\Range(min = PORoundParam::MIN_ALL, max = PORoundParam::MAX)
     *
     * @var int
     */
    public $poRound;

    /**
     * @Assert\Type("int")
     * @ApiAssert\ApiChoice(ClosestDefenderDistanceParam::OPTIONS)
     *
     * @var string
     */
    public $closeDefDistRange;

    /**
     * @Assert\Type("string")
     * @ApiAssert\ApiChoice(ShotClockRangeParam::OPTIONS)
     *
     * @var string
     */
    public $shotClockRange;

    /**
     * @Assert\Type("string")
     * @ApiAssert\ApiRegex(pattern = ShotDistanceRangeParam::FORMAT)
     *
     * @var string
     */
    public $shotDistRange;

    /**
     * @Assert\Type("string")
     * @ApiAssert\ApiChoice(TouchTimeRangeParam::OPTIONS)
     *
     * @var string
     */
    public $touchTimeRange;

    /**
     * @Assert\Type("string")
     * @ApiAssert\ApiChoice(DribbleRangeParam::OPTIONS)
     *
     * @var string
     */
    public $dribbleRange;

    /**
     * @Assert\Type("string")
     * @ApiAssert\ApiChoice(ShotRangeParam::OPTIONS)
     *
     * @var string
     */
    public $generalRange;

    /**
     * @Assert\Type("int")
     * @Assert\Range(min = TeamIdParam::MIN_ALL, max = TeamIdParam::MAX)
     *
     * @var int
     */
    public $teamId;

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
     * @Assert\Date()
     *
     * @var \DateTime|string if string, format is YYYY-MM-DD
     */
    public $dateFrom;

    /**
     * @Assert\Date()
     *
     * @var \DateTime|string if string, format is YYYY-MM-DD
     */
    public $dateTo;

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
    public $vsConference;

    /**
     * @Assert\Type("string")
     * @ApiAssert\ApiChoice(DivisionParam::OPTIONS_WITH_CONFERENCE)
     *
     * @var string
     */
    public $vsDivision;

    /**
     * @Assert\Type("string")
     * @ApiAssert\ApiChoice(ConferenceParam::OPTIONS)
     *
     * @var string
     */
    public $conference;

    /**
     * @Assert\Type("string")
     * @ApiAssert\ApiChoice(DivisionParam::OPTIONS_WITH_CONFERENCE)
     *
     * @var string
     */
    public $division;

    /**
     * @Assert\Type("string")
     * @ApiAssert\ApiChoice(GameSegmentParam::OPTIONS)
     *
     * @var string
     */
    public $gameSegment;

    /**
     * @Assert\NotBlank()
     * @Assert\Type("int")
     * @Assert\Range(min = PeriodParam::MIN_ALL, max = PeriodParam::MAX)
     *
     * @var int
     */
    public $period;

    /**
     * @Assert\NotBlank()
     * @Assert\Type("int")
     * @Assert\Range(min = LastNGamesParam::MIN_ALL, max = LastNGamesParam::MAX)
     *
     * @var int
     */
    public $lastNGames;

    /**
     * {@inheritdoc}
     */
    public function getDefaultValues(): array
    {
        return [
            'perMode'        => PerModeParam::PER_GAME,
            'poRound'        => PORoundParam::MIN_ALL,
            'generalRange'   => ShotRangeParam::OVERALL,
            'teamId'         => TeamIdParam::MIN_ALL,
            'month'          => MonthParam::MIN_ALL,
            'opponentTeamId' => TeamIdParam::MIN_ALL,
            'period'         => PeriodParam::MIN_ALL,
            'lastNGames'     => LastNGamesParam::MIN_ALL,
        ];
    }
}