<?php

namespace JasonRoman\NbaApi\Request\Data\Prod\Playoffs;

use Symfony\Component\Validator\Constraints as Assert;
use JasonRoman\NbaApi\Constraints as ApiAssert;
use JasonRoman\NbaApi\Params\Data\PlayoffSeriesIdParam;
use JasonRoman\NbaApi\Request\AbstractDataRequest;

/**
 * Get the playoff series leaders for a number of statistical categories.
 */
class PlayoffSeriesLeaders extends AbstractDataRequest
{
    const ENDPOINT = '/data/prod/v1/{year}/playoffs_{playoffSeriesId}_leaders.json';

    /**
     * @Assert\NotBlank()
     * @Assert\Type("int")
     * @Assert\Range(min = 2016)
     *
     * @var int
     */
    public $year;

    /**
     * @Assert\NotBlank()
     * @Assert\Type("int")
     * @ApiAssert\ApiChoice(PlayoffSeriesIdParam::OPTIONS)
     *
     * @var int
     */
    public $playoffSeriesId;
}