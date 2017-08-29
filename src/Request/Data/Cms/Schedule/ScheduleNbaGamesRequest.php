<?php

namespace JasonRoman\NbaApi\Request\Data\Cms\Schedule;

use Symfony\Component\Validator\Constraints as Assert;
use JasonRoman\NbaApi\Constraints as ApiAssert;
use JasonRoman\NbaApi\Request\AbstractDataRequest;
use JasonRoman\NbaApi\Params\TeamSlugParam;

/**
 * Get the schedule of NBA games for a season. No parameters ; 2015-16 shows postseason, 2016-17 shows regular season.
 * This may potentially change any time a new season type starts; so 2017-18 preseason could affect what shows for 2016.
 */
class ScheduleNbaGamesRequest extends AbstractDataRequest
{
    const ENDPOINT = '/json/cms/{year}/league/nba_games.json';

    /**
     * @Assert\NotBlank()
     * @Assert\Type("int")
     * @Assert\Range(min = 2014)
     *
     * @var int
     */
    public $year;
}