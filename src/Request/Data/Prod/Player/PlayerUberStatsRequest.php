<?php

namespace JasonRoman\NbaApi\Request\Data\Prod\Player;

use JasonRoman\NbaApi\Params\PlayerIdParam;
use JasonRoman\NbaApi\Request\Data\Prod\AbstractDataProdRequest;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * This does not seem to return any actual data besides keys.
 */
class PlayerUberStatsRequest extends AbstractDataProdRequest
{
    const ENDPOINT = '/prod/v1/{year}/players/{playerId}_uber_stats.json';

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