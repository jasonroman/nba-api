<?php

namespace JasonRoman\NbaApi\Request\Data\Cms\Stats;

use Symfony\Component\Validator\Constraints as Assert;
use JasonRoman\NbaApi\Constraints as ApiAssert;
use JasonRoman\NbaApi\Params\TeamSlugParam;
use JasonRoman\NbaApi\Request\Data\Cms\AbstractDataCmsRequest;

/**
 * Get team regular season overall stats and rankings.
 */
class TeamRegularSeasonStatsAndRankingsRequest extends AbstractDataCmsRequest
{
    const ENDPOINT = '/json/cms/{year}/statistics/{teamSlug}/regseason_stats_and_rankings.json';

    /**
     * @Assert\NotBlank()
     * @Assert\Type("int")
     * @Assert\Range(min = 2011)
     *
     * @var int
     */
    public $year;

    /**
     * @Assert\NotBlank()
     * @Assert\Type("string")
     * @ApiAssert\ApiChoice(TeamSlugParam::OPTIONS)
     *
     * @var string
     */
    public $teamSlug;
}