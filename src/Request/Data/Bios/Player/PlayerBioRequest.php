<?php

namespace JasonRoman\NbaApi\Request\Data\Bios\Player;

use Symfony\Component\Validator\Constraints as Assert;
use JasonRoman\NbaApi\Constraints as ApiAssert;
use JasonRoman\NbaApi\Params\FormatParam;
use JasonRoman\NbaApi\Params\PlayerIdParam;
use JasonRoman\NbaApi\Request\AbstractDataRequest;

/**
 * Get the player overall bio.
 */
class PlayerBioRequest extends AbstractDataRequest
{
    const ENDPOINT = '/{format}/bios/player_{playerId}.{format}';

    /**
     * @Assert\NotBlank()
     * @Assert\Type("string")
     * @ApiAssert\ApiChoice(FormatParam::OPTIONS_JSON)
     *
     * @var string
     */
    public $format;

    /**
     * @Assert\NotBlank()
     * @Assert\Type("int")
     * @Assert\Range(min = PlayerIdParam::MIN, max = PlayerIdParam::MAX)
     *
     * @var int
     */
    public $playerId;
}