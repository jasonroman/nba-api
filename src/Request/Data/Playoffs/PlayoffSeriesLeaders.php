<?php

namespace JasonRoman\NbaApi\Request\Data\Playoffs;

use Symfony\Component\Validator\Constraints as Assert;
use JasonRoman\NbaApi\Constraints as ApiAssert;
use JasonRoman\NbaApi\Params\Data\PlayoffSeriesIdParam;
use JasonRoman\NbaApi\Request\Data\AbstractDataApiRequest;

/**
 * Get the playoff series leaders for a number of statistical categories.
 */
class PlayoffSeriesLeaders extends AbstractDataApiRequest
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
     * @ApiAssert\ApiChoice(choices = PlayoffSeriesIdParam::OPTIONS)
     *
     * @var int
     */
    public $playoffSeriesId;
}