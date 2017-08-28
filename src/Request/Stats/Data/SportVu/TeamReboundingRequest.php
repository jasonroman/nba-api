<?php

namespace JasonRoman\NbaApi\Request\Stats\Data\SportVu;

use Symfony\Component\Validator\Constraints as Assert;
use JasonRoman\NbaApi\Params\SeasonYearParam;
use JasonRoman\NbaApi\Request\AbstractStatsRequest;

/**
 * This appears to have stopped working after the 2015-2016 season.
 */
class TeamReboundingRequest extends AbstractStatsRequest
{
    const ENDPOINT = '/js/data/sportvu/{year}/reboundingTeamData.json';

    /**
     * @Assert\NotBlank()
     * @Assert\Type("int")
     * @Assert\Range(min = SeasonYearParam::SPORTVU_FIRST_YEAR, max = SeasonYearParam::SPORTVU_LAST_YEAR)
     *
     * @var int
     */
    public $year;
}