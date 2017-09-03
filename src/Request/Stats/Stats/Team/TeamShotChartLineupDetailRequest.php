<?php

namespace JasonRoman\NbaApi\Request\Stats\Stats\Team;

use Symfony\Component\Validator\Constraints as Assert;
use JasonRoman\NbaApi\Constraints as ApiAssert;
use JasonRoman\NbaApi\Params\GameIdParam;
use JasonRoman\NbaApi\Params\LeagueIdParam;
use JasonRoman\NbaApi\Params\SeasonParam;
use JasonRoman\NbaApi\Params\Stats\ConferenceParam;
use JasonRoman\NbaApi\Params\Stats\ContextMeasureParam;
use JasonRoman\NbaApi\Params\Stats\DivisionParam;
use JasonRoman\NbaApi\Params\Stats\GameSegmentParam;
use JasonRoman\NbaApi\Params\Stats\GroupIdParam;
use JasonRoman\NbaApi\Params\Stats\LastNGamesParam;
use JasonRoman\NbaApi\Params\Stats\LocationParam;
use JasonRoman\NbaApi\Params\Stats\MonthParam;
use JasonRoman\NbaApi\Params\Stats\OutcomeParam;
use JasonRoman\NbaApi\Params\Stats\PeriodParam;
use JasonRoman\NbaApi\Params\Stats\PerModeParam;
use JasonRoman\NbaApi\Params\Stats\SeasonSegmentParam;
use JasonRoman\NbaApi\Params\Stats\SeasonTypeParam;
use JasonRoman\NbaApi\Params\TeamIdParam;
use JasonRoman\NbaApi\Request\Stats\Stats\AbstractStatsStatsRequest;

/**
 * This appears to not be publicly available on the stats nba website.
 */
class TeamShotChartLineupDetailRequest extends AbstractStatsStatsRequest
{
    const ENDPOINT = '/stats/shotchartlineupdetail';

    /**
     * @Assert\NotBlank()
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
     * @Assert\NotBlank()
     * @Assert\Type("string")
     * @ApiAssert\ApiChoice(SeasonTypeParam::OPTIONS_WITH_ALL_STAR)
     *
     * @var string
     */
    public $seasonType;

    /**
     * @Assert\NotBlank()
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
     * @Assert\NotBlank()
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
     * @Assert\NotBlank()
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
     * @Assert\NotBlank()
     * @Assert\Type("string")
     * @ApiAssert\ApiRegex(GameIdParam::FORMAT)
     *
     * @var string
     */
    public $gameId;

    /**
     * This appears to always be considered null on this request even if using a proper value.
     * It also returns capitalized, and with an underscore - and has a very odd regex.
     *
     * @Assert\NotBlank()
     * @Assert\Type("string")
     * @ApiAssert\ApiRegex(GroupIdParam::FORMAT)
     *
     * @var string
     */
    public $group_id;

    /**
     * This appears to be "" even if set to something, and does not appear to be used at all.
     *
     * @Assert\Type("string")
     *
     * @var string
     */
    public $contextFilter;

    /**
     * @Assert\NotBlank
     * @Assert\Type("string")
     * @ApiAssert\ApiChoice(ContextMeasureParam::OPTIONS)
     *
     * @var string
     */
    public $contextMeasure;

    /**
     * {@inheritdoc}
     */
    public function getExampleValues(): array
    {
        return array_merge(parent::getExampleValues(), [
            'group_id' => '0',
        ]);
    }
}