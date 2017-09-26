<?php

namespace JasonRoman\NbaApi\Request\Data\Prod\Teams;

use JasonRoman\NbaApi\Request\Data\Prod\AbstractDataProdRequest;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Links to Android/iOS apps, TicketMaster tickets, team website/tickets.
 */
class TeamsConfigRequest extends AbstractDataProdRequest
{
    const ENDPOINT = '/prod/{year}/teams_config.json';

    /**
     * @Assert\NotBlank()
     * @Assert\Type("int")
     * @Assert\Range(min = 2015)
     *
     * @var int
     */
    public $year;
}