<?php

namespace JasonRoman\NbaApi\Request\Data\Prod\Teams;

use JasonRoman\NbaApi\Request\Data\Prod\AbstractDataProdRequest;
use Symfony\Component\Validator\Constraints as Assert;

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