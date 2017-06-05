<?php

namespace JasonRoman\NbaApi\Types;

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