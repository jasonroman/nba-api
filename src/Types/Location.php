<?php

namespace JasonRoman\NbaApi\Types;

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