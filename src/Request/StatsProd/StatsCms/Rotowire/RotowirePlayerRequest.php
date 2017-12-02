<?php

namespace JasonRoman\NbaApi\Request\StatsProd\StatsCms\Rotowire;

use JasonRoman\NbaApi\Params\PlayerIdParam;
use JasonRoman\NbaApi\Params\StatsProd\LimitParam;
use JasonRoman\NbaApi\Params\StatsProd\OffsetParam;
use JasonRoman\NbaApi\Request\StatsProd\StatsCms\AbstractStatsProdStatsCmsRequest;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Get the rotowire for a specific player. Same endpoint but separated out to enforce requesting a specific player.
 */
class RotowirePlayerRequest extends AbstractStatsProdStatsCmsRequest
{
    const ENDPOINT = '/wp-json/statscms/v1/rotowire/player';

    /**
     * @Assert\NotBlank()
     * @Assert\Type("int")
     * @Assert\Range(min = PlayerIdParam::MIN, max = PlayerIdParam::MAX)
     *
     * @var int
     */
    public $playerId;

    /**
     * @Assert\Type("int")
     * @Assert\Range(min = LimitParam::MIN)
     *
     * @var string
     */
    public $limit;

    /**
     * @Assert\Type("int")
     * @Assert\Range(min = OffsetParam::MIN)
     *
     * @var string
     */
    public $offset;
}