<?php
declare(strict_types = 1);

namespace JasonRoman\NbaApi\Params\Stats;

class PlayerPositionParam extends AbstractStatsParam
{
    const CENTER         = 'C';
    const FORWARD        = 'F';
    const GUARD          = 'G';

    // it seems like these return errors even though the regular expression is matched
    const CENTER_FORWARD = 'C-F';
    const FORWARD_CENTER = 'F-C';
    const FORWARD_GUARD  = 'F-G';
    const GUARD_FORWARD  = 'G-F';

    // alternate using abbreviations
    const C = 'C';
    const F = 'F';
    const G = 'G';

    // alternate using abbreviations; it seems like these return errors even though the regular expression is matched
    const C_F = 'C-F';
    const F_C = 'F-C';
    const F_G = 'F-G';
    const G_F = 'G-F';

    // these options are alternate designations that appear to be no longer used
    const CENTER_FULL  = 'Center';
    const FORWARD_FULL = 'Forward';
    const GUARD_FULL   = 'Guard';

    const OPTIONS = [
        self::CENTER,
        self::FORWARD,
        self::GUARD,
    ];

    const OPTIONS_FULL = [
        self::CENTER_FULL,
        self::FORWARD_FULL,
        self::GUARD_FULL,
    ];
}