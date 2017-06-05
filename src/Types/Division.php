<?php

namespace JasonRoman\NbaApi\Types;

class Division
{
    const FORMAT = '/((Atlantic)|(Central)|(Northwest)|(Pacific)|(Southeast)|(Southwest))?/';

    const ATLANTIC  = 'Atlantic';
    const CENTRAL   = 'Central';
    const EAST      = 'EAST';
    const NORTHWEST = 'Northwest';
    const PACIFIC   = 'Pacific';
    const SOUTHEAST = 'Southeast';
    const SOUTHWEST = 'Southwest';
    const WEST      = 'WEST';

    /**
     * @var string
     */
    public $value;
}