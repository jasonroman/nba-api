<?php

namespace JasonRoman\NbaApi\Request\StatsProd\StatsCms\Rotowire;

use JasonRoman\NbaApi\Params\PlayerIdParam;
use JasonRoman\NbaApi\Request\AbstractStatsProdRequest;

/**
 * Get the rotowire for a specific player. Same endpoint but separated out to enforce requesting a specific player.
 */
class RotowirePlayerRequest extends AbstractStatsProdRequest
{
    const ENDPOINT = '/wp-json/statscms/v1/rotowire/player/';

    /**
     * @Assert\NotBlank()
     * @Assert\Type("int")
     * @Assert\Range(min = PlayerIdParam::MIN, max = PlayerIdParam::MAX)
     *
     * @var int
     */
    public $playerId;
}