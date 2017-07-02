<?php

namespace JasonRoman\NbaApi\Request\Data\Prod\Player;

use Symfony\Component\Validator\Constraints as Assert;
use JasonRoman\NbaApi\Request\AbstractDataRequest;

/**
 * This does not seem to return any actual data besides keys.
 */
class PlayerUberStatsRequest extends AbstractDataRequest
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