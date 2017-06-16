<?php

namespace JasonRoman\NbaApi\Request\Stats\Params;

class PlayerPosition
{
    const FORMAT = '/((F)|(C)|(G)|(C-F)|(F-C)|(F-G)|(G-F))?/';

    const CENTER         = 'C';
    const FORWARD        = 'F';
    const GUARD          = 'G';

    // it seems like these return errors even though the regular expression is matched
    const CENTER_FORWARD = 'C-F';
    const FORWARD_CENTER = 'F-C';
    const FORWARD_GUARD  = 'F-G';
    const GUARD_FORWARD  = 'G-F';

    // alternate using abbreviations
    const C   = 'C';
    const F   = 'F';
    const G   = 'G';

    // it seems like these return errors even though the regular expression is matched
    const C_F = 'C-F';
    const F_C = 'F-C';
    const F_G = 'F-G';
    const G_F = 'G-F';

    /**
     * @var string
     */
    public $value;
}