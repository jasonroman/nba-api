<?php

namespace JasonRoman\NbaApi\Request\Stats\Params;

class Location
{
    const FORMAT = '/^((Home)|(Road))?$/';

    const HOME = 'Home';
    const ROAD = 'Road';

    /**
     * @var string
     */
    public $value;
}