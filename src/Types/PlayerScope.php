<?php

namespace JasonRoman\NbaApi\Types;

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