<?php

namespace JasonRoman\NbaApi\Request\Data\Player;

use Symfony\Component\Validator\Constraints as Assert;
use JasonRoman\NbaApi\Request\Data\AbstractDataApiRequest;

/**
 * This does not seem to return any actual data besides keys.
 */
class PlayerUberStatsRequest extends AbstractDataApiRequest
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