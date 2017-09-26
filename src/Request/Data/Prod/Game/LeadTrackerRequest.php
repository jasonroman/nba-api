<?php

namespace JasonRoman\NbaApi\Request\Data\Prod\Game;

use JasonRoman\NbaApi\Constraints as ApiAssert;
use JasonRoman\NbaApi\Params\GameIdParam;
use JasonRoman\NbaApi\Request\Data\Prod\AbstractDataProdRequest;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Get the tracking of which team is in the lead of a specific period of a game, and by how many points.
 * Valid from 2014-2015 preseason and later.
 */
class LeadTrackerRequest extends AbstractDataProdRequest
{
    const ENDPOINT = '/prod/v1/{gameDate}/{gameId}_lead_tracker_{period}.json';

    /**
     * @Assert\NotBlank()
     * @Assert\Type("\DateTime")
     *
     * @var \DateTime
     */
    public $gameDate;

    /**
     * @Assert\NotBlank()
     * @Assert\Type("string")
     * @ApiAssert\ApiRegex(GameIdParam::FORMAT)
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