<?php

namespace JasonRoman\NbaApi\Request\Stats\Params;

class PlayerScope
{
    const FORMAT ='/^(All Players)|(Rookies)$/';

    const ALL_PLAYERS = 'All Players';
    const ROOKIES     = 'Rookies';

    /**
     * @var string
     */
    public $value;
}