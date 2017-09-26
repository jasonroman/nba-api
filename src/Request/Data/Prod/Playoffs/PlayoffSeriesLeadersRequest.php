<?php

namespace JasonRoman\NbaApi\Request\Data\Prod\Playoffs;

use JasonRoman\NbaApi\Constraints as ApiAssert;
use JasonRoman\NbaApi\Params\Data\PlayoffSeriesIdParam;
use JasonRoman\NbaApi\Request\Data\Prod\AbstractDataProdRequest;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Get the playoff series leaders for a number of statistical categories.
 */
class PlayoffSeriesLeadersRequest extends AbstractDataProdRequest
{
    const ENDPOINT = '/prod/v1/{year}/playoffs_{playoffSeriesId}_leaders.json';

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