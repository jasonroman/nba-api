<?php

namespace JasonRoman\NbaApi\Request\Stats\Params;

class PlayerExperience
{
    const FORMAT = '/((Rookie)|(Sophomore)|(Veteran))?/';

    const ROOKIE    = 'Rookie';
    const SOPHOMORE = 'Sophomore';
    const VETERAN   = 'Veteran';

    /**
     * @var string
     */
    public $value;
}