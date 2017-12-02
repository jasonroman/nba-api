<?php

namespace JasonRoman\NbaApi\Request\StatsProd\StatsCms\Rotowire;

use JasonRoman\NbaApi\Constraints as ApiAssert;
use JasonRoman\NbaApi\Params\StatsProd\LimitParam;
use JasonRoman\NbaApi\Params\StatsProd\OffsetParam;
use JasonRoman\NbaApi\Params\TeamSlugParam;
use JasonRoman\NbaApi\Request\StatsProd\AbstractStatsProdRequest;
use JasonRoman\NbaApi\Request\StatsProd\StatsCms\AbstractStatsProdStatsCmsRequest;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Get the rotowire for all players.
 */
class RotowirePlayersRequest extends AbstractStatsProdStatsCmsRequest
{
    const ENDPOINT = '/wp-json/statscms/v1/rotowire/player';

    const CONFIG = [
        'base_uri' => AbstractStatsProdRequest::BASE_URI,
        'timeout'  => 60,
    ];

    /**
     * @Assert\Type("string")
     * @ApiAssert\ApiChoice(TeamSlugParam::OPTIONS)
     *
     * @var string
     */
    public $team;

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