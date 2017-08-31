<?php

namespace JasonRoman\NbaApi\Request\Stats\Data\SportVu;

use Symfony\Component\Validator\Constraints as Assert;
use JasonRoman\NbaApi\Params\SeasonYearParam;
use JasonRoman\NbaApi\Request\Stats\Data\AbstractStatsDataRequest;

/**
 * This appears to have stopped working after the 2015-2016 season.
 */
class PlayerPassingRequest extends AbstractStatsDataRequest
{
    const ENDPOINT = '/js/data/sportvu/{year}/passingData.json';

    /**
     * @Assert\NotBlank()
     * @Assert\Type("int")
     * @Assert\Range(min = SeasonYearParam::SPORTVU_FIRST_YEAR, max = SeasonYearParam::SPORTVU_LAST_YEAR)
     *
     * @var int
     */
    public $year;
}