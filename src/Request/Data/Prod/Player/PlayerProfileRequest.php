<?php

namespace JasonRoman\NbaApi\Request\Data\Prod\Player;

use Symfony\Component\Validator\Constraints as Assert;
use JasonRoman\NbaApi\Params\PlayerIdParam;
use JasonRoman\NbaApi\Request\AbstractDataRequest;

/**
 * Get current player information and basic regular season stats for all of the player's seasons.
 */
class PlayerProfileRequest extends AbstractDataRequest
{
    const ENDPOINT = '/prod/v1/{year}/players/{playerId}_profile.json';

    /**
     * @Assert\NotBlank()
     * @Assert\Type("int")
     * @Assert\Range(min = 2015)
     *
     * @var int
     */
    public $year;

    /**
     * @Assert\NotBlank()
     * @Assert\Type("int")
     * @Assert\Range(min = PlayerIdParam::MIN, max = PlayerIdParam::MAX)
     *
     * @var int
     */
    public $playerId;
}