<?php

namespace JasonRoman\NbaApi\Request\Data\Bios\Player;

use JasonRoman\NbaApi\Params\PlayerIdParam;
use JasonRoman\NbaApi\Request\Data\Bios\AbstractDataBiosRequest;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Get the player overall bio.
 */
class PlayerBioRequest extends AbstractDataBiosRequest
{
    const ENDPOINT = '/json/bios/player_{playerId}.json';

    /**
     * @Assert\NotBlank()
     * @Assert\Type("int")
     * @Assert\Range(min = PlayerIdParam::MIN, max = PlayerIdParam::MAX)
     *
     * @var int
     */
    public $playerId;
}