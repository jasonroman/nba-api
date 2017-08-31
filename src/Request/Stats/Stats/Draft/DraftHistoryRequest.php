<?php

namespace JasonRoman\NbaApi\Request\Stats\Stats\Draft;

use Symfony\Component\Validator\Constraints as Assert;
use JasonRoman\NbaApi\Constraints as ApiAssert;
use JasonRoman\NbaApi\Params\LeagueIdParam;
use JasonRoman\NbaApi\Params\SeasonYearParam;
use JasonRoman\NbaApi\Params\Stats\OverallPickParam;
use JasonRoman\NbaApi\Params\Stats\RoundNumParam;
use JasonRoman\NbaApi\Params\Stats\RoundPickParam;
use JasonRoman\NbaApi\Params\TeamIdParam;
use JasonRoman\NbaApi\Request\Stats\Stats\AbstractStatsStatsRequest;

class DraftHistoryRequest extends AbstractStatsStatsRequest
{
    const ENDPOINT = '/stats/drafthistory';

    /**
     * @Assert\NotBlank()
     * @Assert\Type("string")
     * @ApiAssert\ApiRegex(LeagueIdParam::FORMAT)
     *
     * @var string
     */
    public $leagueId;

    /**
     * @Assert\Type("int")
     * @Assert\Range(min = SeasonYearParam::FIRST_DRAFT_SEASON_YEAR)
     * @ApiAssert\ApiRegex(SeasonYearParam::FORMAT)
     *
     * @var int
     */
    public $season;

    /**
     * @Assert\Type("int")
     * @Assert\Range(min = TeamIdParam::MIN, max = TeamIdParam::MAX)
     *
     * @var int
     */
    public $teamId;

    /**
     * @Assert\Type("int")
     * @Assert\Range(min = RoundNumParam::MIN, max = RoundNumParam::MAX)
     *
     * @var int
     */
    public $roundNum;

    /**
     * @Assert\Type("int")
     * @Assert\Range(min = RoundPickParam::MIN, max = RoundPickParam::MAX)
     *
     * @var int
     */
    public $roundPick;

    /**
     * @Assert\Type("int")
     * @Assert\Range(min = OverallPickParam::MIN, max = OverallPickParam::MAX)
     *
     * @var int
     */
    public $overallPick;

    /**
     * @Assert\Type("int")
     * @Assert\Range(min = OverallPickParam::MIN, max = OverallPickParam::MAX)
     *
     * @var int
     */
    public $topX;

    /**
     * @Assert\Type("string")
     *
     * @var string
     */
    public $college;

    public function getDefaultValues(): array
    {
        return [
            'season' => SeasonYearParam::getDefaultValue(),
        ];
    }
}