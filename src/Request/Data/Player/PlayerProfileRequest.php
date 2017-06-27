<?php

namespace JasonRoman\NbaApi\Request\Data\Player;

use Symfony\Component\Validator\Constraints as Assert;
use JasonRoman\NbaApi\Request\Data\AbstractDataApiRequest;

/**
 * Get current player information and basic regular season stats for all of the player's seasons.
 */
class PlayerProfileRequest extends AbstractDataApiRequest
{
    const ENDPOINT = '/data/10s/prod/v1/{year}/players/{personId}_profile.json';

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
     * @Assert\Range(min = 1)
     *
     * @var int
     */
    public $personId;
}