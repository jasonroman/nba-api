<?php

namespace JasonRoman\NbaApi\Request\Data\Player;

use Symfony\Component\Validator\Constraints as Assert;
use JasonRoman\NbaApi\Request\Data\AbstractDataApiRequest;

/**
 * This does not seem to return any actual data besides keys.
 */
class PlayerUberStatsRequest extends AbstractDataApiRequest
{
    const ENDPOINT = '/data/prod/v1/{year}/players/{playerId}_profile.json';

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
     * @Assert\Range(min = 1, max = 2147483647)
     *
     * @var int
     */
    public $playerId;
}