<?php

namespace JasonRoman\NbaApi\Types;

class LeagueId
{
    // for leaguedashlineups - check others
    const FORMAT = '(00)|(20)';

    const NBA      = '00';
    const ABA      = '01';
    const WNBA     = '10';
    const D_LEAGUE = '20';

    /**
     * @var string
     */
    public $value;
}