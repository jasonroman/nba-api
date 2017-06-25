<?php

namespace JasonRoman\NbaApi\Request\Data;

use Symfony\Component\Validator\Constraints as Assert;
use JasonRoman\NbaApi\Constraints as ApiAssert;
use JasonRoman\NbaApi\Request\Data\Params\YearParam;

/**
 * Links to Android/iOS apps, TicketMaster tickets, team website/tickets
 */
class TeamsConfigRequest extends AbstractDataApiRequest
{
    const ENDPOINT = '/data/1h/prod/{year}/teams_config.json';

    /**
     * @var int
     * @ApiAssert\ApiRegex(YearParam::FORMAT)
     * @Assert\Range(min = 2015)
     */
    public $year;
}