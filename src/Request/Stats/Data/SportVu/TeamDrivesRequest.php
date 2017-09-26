<?php

namespace JasonRoman\NbaApi\Request\Stats\Data\SportVu;

use JasonRoman\NbaApi\Params\SeasonYearParam;
use JasonRoman\NbaApi\Request\Stats\Data\AbstractStatsDataRequest;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * This appears to have stopped working after the 2015-2016 season.
 */
class TeamDrivesRequest extends AbstractStatsDataRequest
{
    const ENDPOINT = '/js/data/sportvu/{year}/drivesTeamData.json';

    /**
     * @Assert\NotBlank()
     * @Assert\Type("int")
     * @Assert\Range(min = SeasonYearParam::SPORTVU_FIRST_YEAR, max = SeasonYearParam::SPORTVU_LAST_YEAR)
     *
     * @var int
     */
    public $year;
}