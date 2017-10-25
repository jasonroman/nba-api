<?php

namespace JasonRoman\NbaApi\Request\Data\MobileTeams\Schedule;

use JasonRoman\NbaApi\Constraints as ApiAssert;
use JasonRoman\NbaApi\Params\Data\LeagueSlugParam;
use JasonRoman\NbaApi\Params\FormatParam;
use JasonRoman\NbaApi\Params\LeagueIdParam;
use JasonRoman\NbaApi\Request\Data\MobileTeams\AbstractDataMobileTeamsRequest;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Get the full league schedule with weeks for a given season (includes preseason for NBA).
 * This appears to be identical to the league schedule, but also includes the week number.
 * Valid starting with 2017-18 season.
 */
class LeagueScheduleWeekRequest extends AbstractDataMobileTeamsRequest
{
    const ENDPOINT = '/v2015/{format}/mobile_teams/{leagueSlug}/{year}/league/{leagueId}_full_schedule_week.{format}';

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
     * @Assert\Range(min = 2017)
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
     * {@inheritdoc}
     */
    public static function getExampleValues(): array
    {
        return array_merge(parent::getExampleValues(), [
            'year' => 2017,
        ]);
    }
}