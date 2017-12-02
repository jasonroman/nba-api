<?php

namespace JasonRoman\NbaApi\Request\Stats\Stats\Team;

use JasonRoman\NbaApi\Constraints as ApiAssert;
use JasonRoman\NbaApi\Params\GameIdParam;
use JasonRoman\NbaApi\Params\LeagueIdParam;
use JasonRoman\NbaApi\Params\SeasonParam;
use JasonRoman\NbaApi\Params\Stats\ConferenceParam;
use JasonRoman\NbaApi\Params\Stats\DivisionParam;
use JasonRoman\NbaApi\Params\Stats\LocationParam;
use JasonRoman\NbaApi\Params\Stats\OutcomeParam;
use JasonRoman\NbaApi\Params\Stats\PoRoundParam;
use JasonRoman\NbaApi\Params\Stats\SeasonSegmentParam;
use JasonRoman\NbaApi\Params\Stats\SeasonTypeParam;
use JasonRoman\NbaApi\Params\TeamIdParam;
use JasonRoman\NbaApi\Request\Stats\Stats\AbstractStatsStatsRequest;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Newly-introduced endpoints in the 2017-18 season do not seem to throw errors on invalid parameters.
 * This corresponds to Team Streaks searching on the stats.nba.com website.
 * Earliest season for this endpoint is 1983-1984.
 *
 * Note that for comparison values, 'gt' means >= while 'lt' means < while 'btr' means > and 'wrs' means <
 */
class TeamGameStreakFinderRequest extends AbstractStatsStatsRequest
{
    const ENDPOINT = '/stats/teamgamestreakfinder';

    /**
     * @Assert\Type("int")
     * @Assert\Range(min = 0)
     *
     * @var int
     */
    public $minGames;

    /**
     * Hard to tell what this does. Putting in high values seems to bring back teams that had
     * large winning streaks, but it does not seem to be checking for >= this value.
     *
     * @Assert\Type("int")
     * @Assert\Range(min = 1)
     *
     * @var int
     */
    public $wStreak;

    /**
     * Hard to tell what this does. Putting in high values seems to bring back teams that had
     * large losing streaks, but it does not seem to be checking for >= this value.
     *
     * @Assert\Type("int")
     * @Assert\Range(min = 1)
     *
     * @var int
     */
    public $lStreak;

    /**
     * @Assert\Type("bool")
     *
     * @var bool
     */
    public $activeStreaksOnly;

    /**
     * @Assert\Type("bool")
     *
     * @var bool
     */
    public $activeTeamsOnly;

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
     * @Assert\Type("string")
     * @ApiAssert\ApiRegex(GameIdParam::FORMAT)
     *
     * @var string
     */
    public $gameId;

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
     * @Assert\Range(min = 0)
     *
     * @var int
     */
    public $gtPtsPaint;

    /**
     * @Assert\Type("int")
     * @Assert\Range(min = 0)
     *
     * @var int
     */
    public $gtPtsFb;

    /**
     * @Assert\Type("int")
     * @Assert\Range(min = 0)
     *
     * @var int
     */
    public $gtPts2ndChance;

    /**
     * @Assert\Type("int")
     * @Assert\Range(min = 0)
     *
     * @var int
     */
    public $gtPtsOffTov;

    /**
     * @Assert\Type("int")
     * @Assert\Range(min = 0)
     *
     * @var int
     */
    public $gtOppPtsPaint;

    /**
     * @Assert\Type("int")
     * @Assert\Range(min = 0)
     *
     * @var int
     */
    public $gtOppPtsFb;

    /**
     * @Assert\Type("int")
     * @Assert\Range(min = 0)
     *
     * @var int
     */
    public $gtOppPts2ndChance;

    /**
     * @Assert\Type("int")
     * @Assert\Range(min = 0)
     *
     * @var int
     */
    public $gtOppPtsOffTov;

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
     * @Assert\Range(min = 1)
     *
     * @var int
     */
    public $ltPtsPaint;

    /**
     * @Assert\Type("int")
     * @Assert\Range(min = 1)
     *
     * @var int
     */
    public $ltPtsFb;

    /**
     * @Assert\Type("int")
     * @Assert\Range(min = 1)
     *
     * @var int
     */
    public $ltPts2ndChance;

    /**
     * @Assert\Type("int")
     * @Assert\Range(min = 1)
     *
     * @var int
     */
    public $ltPtsOffTov;

    /**
     * @Assert\Type("int")
     * @Assert\Range(min = 1)
     *
     * @var int
     */
    public $ltOppPtsPaint;

    /**
     * @Assert\Type("int")
     * @Assert\Range(min = 1)
     *
     * @var int
     */
    public $ltOppPtsFb;

    /**
     * @Assert\Type("int")
     * @Assert\Range(min = 1)
     *
     * @var int
     */
    public $ltOppPts2ndChance;

    /**
     * @Assert\Type("int")
     * @Assert\Range(min = 1)
     *
     * @var int
     */
    public $ltOppPtsOffTov;

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
     * @Assert\Type("int")
     * @Assert\Range(min = 0)
     *
     * @var int
     */
    public $eqPtsPaint;

    /**
     * @Assert\Type("int")
     * @Assert\Range(min = 0)
     *
     * @var int
     */
    public $eqPtsFb;

    /**
     * @Assert\Type("int")
     * @Assert\Range(min = 0)
     *
     * @var int
     */
    public $eqPts2ndChance;

    /**
     * @Assert\Type("int")
     * @Assert\Range(min = 0)
     *
     * @var int
     */
    public $eqPtsOffTov;

    /**
     * @Assert\Type("int")
     * @Assert\Range(min = 0)
     *
     * @var int
     */
    public $eqOppPtsPaint;

    /**
     * @Assert\Type("int")
     * @Assert\Range(min = 0)
     *
     * @var int
     */
    public $eqOppPtsFb;

    /**
     * @Assert\Type("int")
     * @Assert\Range(min = 0)
     *
     * @var int
     */
    public $eqOppPts2ndChance;

    /**
     * @Assert\Type("int")
     * @Assert\Range(min = 0)
     *
     * @var int
     */
    public $eqOppPtsOffTov;

    /**
     * @Assert\Type("int")
     * @Assert\Range(min = 0)
     *
     * @var int
     */
    public $btrOppPts;

    /**
     * @Assert\Type("int")
     * @Assert\Range(min = 0)
     *
     * @var int
     */
    public $btrOppReb;

    /**
     * @Assert\Type("int")
     * @Assert\Range(min = 0)
     *
     * @var int
     */
    public $btrOppAst;

    /**
     * @Assert\Type("int")
     * @Assert\Range(min = 0)
     *
     * @var int
     */
    public $btrOppStl;

    /**
     * @Assert\Type("int")
     * @Assert\Range(min = 0)
     *
     * @var int
     */
    public $btrOppBlk;

    /**
     * @Assert\Type("int")
     * @Assert\Range(min = 0)
     *
     * @var int
     */
    public $btrOppOReb;

    /**
     * @Assert\Type("int")
     * @Assert\Range(min = 0)
     *
     * @var int
     */
    public $btrOppDReb;

    /**
     * @Assert\Type("int")
     * @Assert\Range(min = 0)
     *
     * @var int
     */
    public $btrOppTov;

    /**
     * @Assert\Type("int")
     * @Assert\Range(min = 0)
     *
     * @var int
     */
    public $btrOppPF;

    /**
     * @Assert\Type("int")
     * @Assert\Range(min = 0)
     *
     * @var int
     */
    public $btrOppFGM;

    /**
     * @Assert\Type("int")
     * @Assert\Range(min = 0)
     *
     * @var int
     */
    public $btrOppFGA;

    /**
     * @Assert\Type("int")
     * @Assert\Range(min = 0)
     *
     * @var int
     */
    public $btrOppFG_Pct;

    /**
     * @Assert\Type("int")
     * @Assert\Range(min = 0)
     *
     * @var int
     */
    public $btrOppFTM;

    /**
     * @Assert\Type("int")
     * @Assert\Range(min = 0)
     *
     * @var int
     */
    public $btrOppFTA;

    /**
     * @Assert\Type("int")
     * @Assert\Range(min = 0)
     *
     * @var int
     */
    public $btrOppFT_Pct;

    /**
     * @Assert\Type("int")
     * @Assert\Range(min = 0)
     *
     * @var int
     */
    public $btrOppFG3M;

    /**
     * @Assert\Type("int")
     * @Assert\Range(min = 0)
     *
     * @var int
     */
    public $btrOppFG3A;

    /**
     * @Assert\Type("int")
     * @Assert\Range(min = 0)
     *
     * @var int
     */
    public $btrOppFG3Pct;

    /**
     * @Assert\Type("int")
     * @Assert\Range(min = 0)
     *
     * @var int
     */
    public $btrOppPtsPaint;

    /**
     * @Assert\Type("int")
     * @Assert\Range(min = 0)
     *
     * @var int
     */
    public $btrOppPtsFb;

    /**
     * @Assert\Type("int")
     * @Assert\Range(min = 0)
     *
     * @var int
     */
    public $btrOppPts2ndChance;

    /**
     * @Assert\Type("int")
     * @Assert\Range(min = 0)
     *
     * @var int
     */
    public $btrOppPtsOffTov;

    /**
     * @Assert\Type("int")
     * @Assert\Range(min = 0)
     *
     * @var int
     */
    public $wrsOppPts;

    /**
     * @Assert\Type("int")
     * @Assert\Range(min = 0)
     *
     * @var int
     */
    public $wrsOppReb;

    /**
     * @Assert\Type("int")
     * @Assert\Range(min = 0)
     *
     * @var int
     */
    public $wrsOppAst;

    /**
     * @Assert\Type("int")
     * @Assert\Range(min = 0)
     *
     * @var int
     */
    public $wrsOppStl;

    /**
     * @Assert\Type("int")
     * @Assert\Range(min = 0)
     *
     * @var int
     */
    public $wrsOppBlk;

    /**
     * @Assert\Type("int")
     * @Assert\Range(min = 0)
     *
     * @var int
     */
    public $wrsOppOReb;

    /**
     * @Assert\Type("int")
     * @Assert\Range(min = 0)
     *
     * @var int
     */
    public $wrsOppDReb;

    /**
     * @Assert\Type("int")
     * @Assert\Range(min = 0)
     *
     * @var int
     */
    public $wrsOppTov;

    /**
     * @Assert\Type("int")
     * @Assert\Range(min = 0)
     *
     * @var int
     */
    public $wrsOppPF;

    /**
     * @Assert\Type("int")
     * @Assert\Range(min = 0)
     *
     * @var int
     */
    public $wrsOppFGM;

    /**
     * @Assert\Type("int")
     * @Assert\Range(min = 0)
     *
     * @var int
     */
    public $wrsOppFGA;

    /**
     * @Assert\Type("int")
     * @Assert\Range(min = 0)
     *
     * @var int
     */
    public $wrsOppFG_Pct;

    /**
     * @Assert\Type("int")
     * @Assert\Range(min = 0)
     *
     * @var int
     */
    public $wrsOppFTM;

    /**
     * @Assert\Type("int")
     * @Assert\Range(min = 0)
     *
     * @var int
     */
    public $wrsOppFTA;

    /**
     * @Assert\Type("int")
     * @Assert\Range(min = 0)
     *
     * @var int
     */
    public $wrsOppFT_Pct;

    /**
     * @Assert\Type("int")
     * @Assert\Range(min = 0)
     *
     * @var int
     */
    public $wrsOppFG3M;

    /**
     * @Assert\Type("int")
     * @Assert\Range(min = 0)
     *
     * @var int
     */
    public $wrsOppFG3A;

    /**
     * @Assert\Type("int")
     * @Assert\Range(min = 0)
     *
     * @var int
     */
    public $wrsOppFG3Pct;

    /**
     * @Assert\Type("int")
     * @Assert\Range(min = 0)
     *
     * @var int
     */
    public $wrsOppPtsPaint;

    /**
     * @Assert\Type("int")
     * @Assert\Range(min = 0)
     *
     * @var int
     */
    public $wrsOppPtsFb;

    /**
     * @Assert\Type("int")
     * @Assert\Range(min = 0)
     *
     * @var int
     */
    public $wrsOppPts2ndChance;

    /**
     * @Assert\Type("int")
     * @Assert\Range(min = 0)
     *
     * @var int
     */
    public $wrsOppPtsOffTov;
}