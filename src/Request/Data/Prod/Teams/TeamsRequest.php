<?php

namespace JasonRoman\NbaApi\Request\Data\Prod\Teams;

use Symfony\Component\Validator\Constraints as Assert;
use JasonRoman\NbaApi\Request\Data\Prod\AbstractDataProdRequest;

class TeamsRequest extends AbstractDataProdRequest
{
    const ENDPOINT = '/prod/v1/{year}/teams.json';

    /**
     * @Assert\NotBlank()
     * @Assert\Type("int")
     * @Assert\Range(min = 2012)
     *
     * @var int
     */
    public $year;
}