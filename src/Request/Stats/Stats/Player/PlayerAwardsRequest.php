<?php

namespace JasonRoman\NbaApi\Request\Stats\Stats\Player;

use Symfony\Component\Validator\Constraints as Assert;
use JasonRoman\NbaApi\Params\PlayerIdParam;
use JasonRoman\NbaApi\Request\AbstractStatsRequest;

class PlayerAwardsRequest extends AbstractStatsRequest
{
    const ENDPOINT = '/stats/playerawards';

    /**
     * @Assert\NotBlank()
     * @Assert\Type("int")
     * @Assert\Range(min = PlayerIdParam::MIN, max = PlayerIdParam::MAX)
     *
     * @var int
     */
    public $playerId;
}