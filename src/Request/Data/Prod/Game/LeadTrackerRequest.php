<?php

namespace JasonRoman\NbaApi\Request\Data\Prod\Game;

use Symfony\Component\Validator\Constraints as Assert;
use JasonRoman\NbaApi\Constraints as ApiAssert;
use JasonRoman\NbaApi\Params\Data\GameDateParam;
use JasonRoman\NbaApi\Params\GameIdParam;
use JasonRoman\NbaApi\Request\AbstractDataRequest;

/**
 * Get the tracking of which team is in the lead of a specific period of a game, and by how many points.
 * Valid from 2014-2015 preseason and later.
 */
class LeadTrackerRequest extends AbstractDataRequest
{
    const ENDPOINT = '/prod/v1/{gameDate}/{gameId}_lead_tracker_{period}.json';

    /**
     * @Assert\NotBlank()
     * @Assert\Date()
     * @Assert\Range(min = GameDateParam::MIN_DATE)
     *
     * @var \DateTime|string if string, format is YYYY-MM-DD
     */
    public $gameDate;

    /**
     * @Assert\NotBlank()
     * @Assert\Type("string")
     * @ApiAssert\ApiRegex(pattern = GameIdParam::FORMAT)
     *
     * @var string
     */
    public $gameId;

    /**
     * @Assert\NotBlank()
     * @Assert\Type("int")
     * @Assert\Range(min = 1)
     *
     * @var int
     */
    public $period;
}