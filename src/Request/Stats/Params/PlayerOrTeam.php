<?php

namespace JasonRoman\NbaApi\Request\Stats\Params;

class PlayerOrTeam
{
    const FORMAT = '/^(Player)|(Team)$/';

    const PLAYER = 'Player';
    const TEAM   = 'Team';

    /**
     * @var string
     */
    public $value;
}