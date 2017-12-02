<?php

namespace JasonRoman\NbaApi\Request\Stats\Stats\Games;

use JasonRoman\NbaApi\Constraints as ApiAssert;
use JasonRoman\NbaApi\Params\LeagueIdParam;
use JasonRoman\NbaApi\Params\PlayerIdParam;
use JasonRoman\NbaApi\Params\SeasonParam;
use JasonRoman\NbaApi\Params\Stats\ConferenceParam;
use JasonRoman\NbaApi\Params\Stats\DivisionParam;
use JasonRoman\NbaApi\Params\Stats\LocationParam;
use JasonRoman\NbaApi\Params\Stats\OutcomeParam;
use JasonRoman\NbaApi\Params\Stats\PlayerOrTeamParam;
use JasonRoman\NbaApi\Params\Stats\PoRoundParam;
use JasonRoman\NbaApi\Params\Stats\SeasonSegmentParam;
use JasonRoman\NbaApi\Params\Stats\SeasonTypeParam;
use JasonRoman\NbaApi\Params\Stats\StarterBenchParam;
use JasonRoman\NbaApi\Params\TeamIdParam;
use JasonRoman\NbaApi\Request\Stats\Stats\AbstractStatsStatsRequest;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Newly-introduced endpoints in the 2017-18 season do not seem to throw errors on invalid parameters.
 * This corresponds to Player Box Scores and Team Box Scores searching on the stats.nba.com website.
 * Earliest season for this endpoint is 1983-1984.
 *
 * Note that for comparison values, 'gt' means >= while 'lt' means <
 * and triple-doubles (TD), double-doubles (DD), and minutes are only valid for players.
 */
class LeagueGameFinderRequest extends AbstractStatsStatsRequest
{
    const ENDPOINT = '/stats/leaguegamefinder';

    /**
     * @Assert\NotBlank()
     * @Assert\Type("string")
     * @ApiAssert\ApiChoice(PlayerOrTeamParam::OPTIONS_ABBREV)
     *
     * @var string
     */
    public $playerOrTeam;

    /**
     * @Assert\Type("string")
     * @ApiAssert\ApiChoice(LeagueIdParam::OPTIONS_ALL)
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
     * @ApiAssert\ApiChoice(SeasonTypeParam::OPTIONS_WITH_ALL_STAR_ALT)
     *
     * @var string
     */
    public $seasonType;

    /**
     * @Assert\Type("int")
     * @Assert\Range(min = TeamIdParam::MIN, max = TeamIdParam::MAX)
     *
     * @var int
     */
    public $teamId;

    /**
     * @Assert\Type("int")
     * @Assert\Range(min = TeamIdParam::MIN, max = TeamIdParam::MAX)
     *
     * @var int
     */
    public $vsTeamId;

    /**
     * @Assert\Type("int")
     * @Assert\Range(min = PlayerIdParam::MIN, max = PlayerIdParam::MAX)
     *
     * @var int
     */
    public $playerId;

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
     * @ApiAssert\ApiChoice(SeasonSegmentParam::OPTIONS)
     *
     * @var string
     */
    public $seasonSegment;

    /**
     * @Assert\Type("int")
     * @Assert\Range(min = PoRoundParam::MIN_ALL, max = PoRoundParam::MAX)
     *
     * @var int
     */
    public $poRound;

    /**
     * @Assert\Type("string")
     * @ApiAssert\ApiChoice(StarterBenchParam::OPTIONS)
     *
     * @var string
     */
    public $starterBench;

    /**
     * @Assert\Type("int")
     * @Assert\Range(min = 0)
     *
     * @var int
     */
    public $gtPts;

    /**
     * @Assert\Type("int")
     * @Assert\Range(min = 0)
     *
     * @var int
     */
    public $gtReb;

    /**
     * @Assert\Type("int")
     * @Assert\Range(min = 0)
     *
     * @var int
     */
    public $gtAst;

    /**
     * @Assert\Type("int")
     * @Assert\Range(min = 0)
     *
     * @var int
     */
    public $gtStl;

    /**
     * @Assert\Type("int")
     * @Assert\Range(min = 0)
     *
     * @var int
     */
    public $gtBlk;

    /**
     * @Assert\Type("int")
     * @Assert\Range(min = 0)
     *
     * @var int
     */
    public $gtOReb;

    /**
     * @Assert\Type("int")
     * @Assert\Range(min = 0)
     *
     * @var int
     */
    public $gtDReb;

    /**
     * @Assert\Type("int")
     * @Assert\Range(min = 0)
     *
     * @var int
     */
    public $gtDD;

    /**
     * @Assert\Type("int")
     * @Assert\Range(min = 0)
     *
     * @var int
     */
    public $gtTD;

    /**
     * @Assert\Type("int")
     * @Assert\Range(min = 0)
     *
     * @var int
     */
    public $gtMinutes;

    /**
     * @Assert\Type("int")
     * @Assert\Range(min = 0)
     *
     * @var int
     */
    public $gtTov;

    /**
     * @Assert\Type("int")
     * @Assert\Range(min = 0)
     *
     * @var int
     */
    public $gtPF;

    /**
     * @Assert\Type("int")
     * @Assert\Range(min = 0)
     *
     * @var int
     */
    public $gtFGM;

    /**
     * @Assert\Type("int")
     * @Assert\Range(min = 0)
     *
     * @var int
     */
    public $gtFGA;

    /**
     * @Assert\Type("int")
     * @Assert\Range(min = 0)
     *
     * @var int
     */
    public $gtFG_Pct;

    /**
     * @Assert\Type("int")
     * @Assert\Range(min = 0)
     *
     * @var int
     */
    public $gtFTM;

    /**
     * @Assert\Type("int")
     * @Assert\Range(min = 0)
     *
     * @var int
     */
    public $gtFTA;

    /**
     * @Assert\Type("int")
     * @Assert\Range(min = 0)
     *
     * @var int
     */
    public $gtFT_Pct;

    /**
     * @Assert\Type("int")
     * @Assert\Range(min = 0)
     *
     * @var int
     */
    public $gtFG3M;

    /**
     * @Assert\Type("int")
     * @Assert\Range(min = 0)
     *
     * @var int
     */
    public $gtFG3A;

    /**
     * @Assert\Type("int")
     * @Assert\Range(min = 0)
     *
     * @var int
     */
    public $gtFG3_Pct;

    /**
     * @Assert\Type("int")
     * @Assert\Range(min = 1)
     *
     * @var int
     */
    public $ltPts;

    /**
     * @Assert\Type("int")
     * @Assert\Range(min = 1)
     *
     * @var int
     */
    public $ltReb;

    /**
     * @Assert\Type("int")
     * @Assert\Range(min = 1)
     *
     * @var int
     */
    public $ltAst;

    /**
     * @Assert\Type("int")
     * @Assert\Range(min = 1)
     *
     * @var int
     */
    public $ltStl;

    /**
     * @Assert\Type("int")
     * @Assert\Range(min = 1)
     *
     * @var int
     */
    public $ltBlk;

    /**
     * @Assert\Type("int")
     * @Assert\Range(min = 1)
     *
     * @var int
     */
    public $ltOReb;

    /**
     * @Assert\Type("int")
     * @Assert\Range(min = 1)
     *
     * @var int
     */
    public $ltDReb;

    /**
     * @Assert\Type("int")
     * @Assert\Range(min = 1)
     *
     * @var int
     */
    public $ltDD;

    /**
     * @Assert\Type("int")
     * @Assert\Range(min = 1)
     *
     * @var int
     */
    public $ltTD;

    /**
     * @Assert\Type("int")
     * @Assert\Range(min = 1)
     *
     * @var int
     */
    public $ltMinutes;

    /**
     * @Assert\Type("int")
     * @Assert\Range(min = 1)
     *
     * @var int
     */
    public $ltTov;

    /**
     * @Assert\Type("int")
     * @Assert\Range(min = 1)
     *
     * @var int
     */
    public $ltPF;

    /**
     * @Assert\Type("int")
     * @Assert\Range(min = 1)
     *
     * @var int
     */
    public $ltFGM;

    /**
     * @Assert\Type("int")
     * @Assert\Range(min = 1)
     *
     * @var int
     */
    public $ltFGA;

    /**
     * @Assert\Type("int")
     * @Assert\Range(min = 1)
     *
     * @var int
     */
    public $ltFG_Pct;

    /**
     * @Assert\Type("int")
     * @Assert\Range(min = 1)
     *
     * @var int
     */
    public $ltFTM;

    /**
     * @Assert\Type("int")
     * @Assert\Range(min = 1)
     *
     * @var int
     */
    public $ltFTA;

    /**
     * @Assert\Type("int")
     * @Assert\Range(min = 1)
     *
     * @var int
     */
    public $ltFT_Pct;

    /**
     * @Assert\Type("int")
     * @Assert\Range(min = 1)
     *
     * @var int
     */
    public $ltFG3M;

    /**
     * @Assert\Type("int")
     * @Assert\Range(min = 1)
     *
     * @var int
     */
    public $ltFG3A;

    /**
     * @Assert\Type("int")
     * @Assert\Range(min = 1)
     *
     * @var int
     */
    public $ltFG3_Pct;

    /**
     * @Assert\Type("int")
     * @Assert\Range(min = 0)
     *
     * @var int
     */
    public $eqPts;

    /**
     * @Assert\Type("int")
     * @Assert\Range(min = 0)
     *
     * @var int
     */
    public $eqReb;

    /**
     * @Assert\Type("int")
     * @Assert\Range(min = 0)
     *
     * @var int
     */
    public $eqAst;

    /**
     * @Assert\Type("int")
     * @Assert\Range(min = 0)
     *
     * @var int
     */
    public $eqStl;

    /**
     * @Assert\Type("int")
     * @Assert\Range(min = 0)
     *
     * @var int
     */
    public $eqBlk;

    /**
     * @Assert\Type("int")
     * @Assert\Range(min = 0)
     *
     * @var int
     */
    public $eqOReb;

    /**
     * @Assert\Type("int")
     * @Assert\Range(min = 0)
     *
     * @var int
     */
    public $eqDReb;

    /**
     * @Assert\Type("int")
     * @Assert\Range(min = 0)
     *
     * @var int
     */
    public $eqDD;

    /**
     * @Assert\Type("int")
     * @Assert\Range(min = 0)
     *
     * @var int
     */
    public $eqTD;

    /**
     * @Assert\Type("int")
     * @Assert\Range(min = 0)
     *
     * @var int
     */
    public $eqMinutes;

    /**
     * @Assert\Type("int")
     * @Assert\Range(min = 0)
     *
     * @var int
     */
    public $eqTov;

    /**
     * @Assert\Type("int")
     * @Assert\Range(min = 0)
     *
     * @var int
     */
    public $eqPF;

    /**
     * @Assert\Type("int")
     * @Assert\Range(min = 0)
     *
     * @var int
     */
    public $eqFGM;

    /**
     * @Assert\Type("int")
     * @Assert\Range(min = 0)
     *
     * @var int
     */
    public $eqFGA;

    /**
     * @Assert\Type("int")
     * @Assert\Range(min = 0)
     *
     * @var int
     */
    public $eqFG_Pct;

    /**
     * @Assert\Type("int")
     * @Assert\Range(min = 0)
     *
     * @var int
     */
    public $eqFTM;

    /**
     * @Assert\Type("int")
     * @Assert\Range(min = 0)
     *
     * @var int
     */
    public $eqFTA;

    /**
     * @Assert\Type("int")
     * @Assert\Range(min = 0)
     *
     * @var int
     */
    public $eqFT_Pct;

    /**
     * @Assert\Type("int")
     * @Assert\Range(min = 0)
     *
     * @var int
     */
    public $eqFG3M;

    /**
     * @Assert\Type("int")
     * @Assert\Range(min = 0)
     *
     * @var int
     */
    public $eqFG3A;

    /**
     * @Assert\Type("int")
     * @Assert\Range(min = 0)
     *
     * @var int
     */
    public $eqFG3_Pct;

    /**
     * {@inheritdoc}
     */
    public static function getExampleValues(): array
    {
        return array_merge(parent::getExampleValues(), [
            'playerOrTeam' => PlayerOrTeamParam::TEAM_ABBREV,
        ]);
    }
}