<?php

namespace JasonRoman\NbaApi\Request\Stats\Stats\Stats;

use Symfony\Component\Validator\Constraints as Assert;
use JasonRoman\NbaApi\Constraints as ApiAssert;
use JasonRoman\NbaApi\Params\LeagueIdParam;
use JasonRoman\NbaApi\Params\Stats\ConferenceParam;
use JasonRoman\NbaApi\Params\Stats\DivisionParam;
use JasonRoman\NbaApi\Params\Stats\GameSegmentParam;
use JasonRoman\NbaApi\Params\Stats\GroupQuantityParam;
use JasonRoman\NbaApi\Params\Stats\LastNGamesParam;
use JasonRoman\NbaApi\Params\Stats\MeasureTypeParam;
use JasonRoman\NbaApi\Params\Stats\MonthParam;
use JasonRoman\NbaApi\Params\Stats\OutcomeParam;
use JasonRoman\NbaApi\Params\Stats\PerModeParam;
use JasonRoman\NbaApi\Params\Stats\PeriodParam;
use JasonRoman\NbaApi\Params\Stats\PORoundParam;
use JasonRoman\NbaApi\Params\Stats\SeasonTypeParam;
use JasonRoman\NbaApi\Params\Stats\SeasonSegmentParam;
use JasonRoman\NbaApi\Params\TeamIdParam;
use JasonRoman\NbaApi\Request\AbstractDataRequest;

class LineupStatsRequest extends AbstractDataRequest
{
    const ENDPOINT = '/stats/leaguedashlineups';

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
     * @Assert\NotBlank()
     * @Assert\Type("string")
     * @ApiAssert\ApiChoice(SeasonSegmentParam::OPTIONS)
     *
     * @var string
     */
    public $seasonSegment;

    /**
     * @Assert\NotBlank()
     * @Assert\Type("string")
     * @ApiAssert\ApiChoice(MeasureTypeParam::OPTIONS)
     *
     * @var string
     */
    public $measureType;

    /**
     * @Assert\NotBlank()
     * @Assert\Type("string")
     * @ApiAssert\ApiChoice(PerModeParam::OPTIONS_ALL)
     *
     * @var string
     */
    public $perMode;

    /**
     * @Assert\NotBlank()
     * @Assert\Type("bool")
     *
     * @var string
     */
    public $plusMinus;

    /**
     * @Assert\NotBlank()
     * @Assert\Type("string")
     * @Assert\Type("bool")
     *
     * @var string
     */
    public $paceAdjust;

    /**
     * @Assert\NotBlank()
     * @Assert\Type("string")
     * @Assert\Type("bool")
     *
     * @var string
     */
    public $rank;

    /**
     * @Assert\Type("int")
     * @Assert\Range(min = GroupQuantityParam::MIN_LOGICAL, max = GroupQuantityParam::MAX)
     *
     * @var string
     */
    public $groupQuantity;

    /**
     * @Assert\Type("string")
     * @ApiAssert\ApiChoice(LeagueIdParam::OPTIONS_NBA_G_LEAGUE)
     *
     * @var string
     */
    public $leagueId;

    /**
     * This is oddly 'required', but defaults/allows a null value. Must be present in the query string.
     *
     * @Assert\Date()
     *
     * @var \DateTime|string if string, format is YYYY-MM-DD
     */
    public $dateFrom;

    /**
     * This is oddly 'required', but defaults/allows a null value. Must be present in the query string.
     *
     * @Assert\Date()
     *
     * @var \DateTime|string if string, format is YYYY-MM-DD
     */
    public $dateTo;

    /**
     * @Assert\NotBlank()
     * @Assert\Type("int")
     * @Assert\Range(min = MonthParam::MIN_ALL, max = MonthParam::MAX_VALUE)
     *
     * @var int
     */
    public $month;

    /**
     * This is oddly 'required', but defaults/allows a null value. Must be present in the query string.
     *
     * @Assert\Type("string")
     * @ApiAssert\ApiChoice(OutcomeParam::OPTIONS)
     *
     * @var string
     */
    public $outcome;

    /**
     * This is oddly 'required', but defaults/allows a null value. Must be present in the query string.
     *
     * @Assert\Type("string")
     * @ApiAssert\ApiChoice(GameSegmentParam::OPTIONS)
     *
     * @var string
     */
    public $gameSegment;

    /**
     * This is oddly 'required', but defaults/allows a null value. Must be present in the query string.
     *
     * @Assert\Type("string")
     * @ApiAssert\ApiChoice(ConferenceParam::OPTIONS)
     *
     * @var string
     */
    public $vsConference;

    /**
     * This is oddly 'required', but defaults/allows a null value. Must be present in the query string.
     *
     * @Assert\Type("string")
     * @ApiAssert\ApiChoice(DivisionParam::OPTIONS_WITH_CONFERENCE)
     *
     * @var string
     */
    public $vsDivision;

    /**
     * @Assert\NotBlank()
     * @Assert\Type("int")
     * @Assert\Range(min = TeamIdParam::MIN_ALL, max = TeamIdParam::MAX_VALUE)
     *
     * @var int
     */
    public $teamId;

    /**
     * @Assert\NotBlank()
     * @Assert\Type("int")
     * @Assert\Range(min = TeamIdParam::MIN_ALL, max = TeamIdParam::MAX_VALUE)
     *
     * @var int
     */
    public $opponentTeamId;

    /**
     * This is oddly 'required', but defaults/allows a null value. Must be present in the query string.
     *
     * @Assert\Type("string")
     * @ApiAssert\ApiChoice(LocationParam::OPTIONS)
     *
     * @var string
     */
    public $location;

    /**
     * @Assert\NotBlank()
     * @Assert\Type("int")
     * @Assert\Range(min = PeriodParam::MIN_ALL, max = PeriodParam::MAX_VALUE)
     *
     * @var int
     */
    public $period;

    /**
     * @Assert\NotBlank()
     * @Assert\Type("int")
     * @Assert\Range(min = LastNGamesParam::MIN_ALL, max = LastNGamesParam::MAX_VALUE)
     *
     * @var int
     */
    public $lastNGames;

    /**
     * @Assert\Type("int")
     * @Assert\Range(min = PORoundParam::MIN_ALL, max = PORoundParam::MAX_VALUE)
     *
     * @var int
     */
    public $poRound;

    /**
     * @todo - check if null here will result in still existing in query string
     * {@inheritdoc}
     */
    public function getDefaultValues(): array
    {
        return [
            'plusMinus'      => false,
            'paceAdjust'     => false,
            'rank'           => false,
            'dateFrom'       => null,
            'dateTo'         => null,
            'month'          => MonthParam::MIN_ALL,
            'outcome'        => null,
            'vsConference'   => null,
            'vsDivision'     => null,
            'teamId'         => TeamIdParam::MIN_ALL,
            'opponentTeamId' => TeamIdParam::MIN_ALL,
            'location'       => null,
            'period'         => PeriodParam::MIN_ALL,
            'lastNGames'     => LastNGamesParam::MIN_ALL,
            'poRound'        => PORoundParam::MIN_ALL,
        ];
    }
}