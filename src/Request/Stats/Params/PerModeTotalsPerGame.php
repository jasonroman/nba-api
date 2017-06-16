<?php

namespace JasonRoman\NbaApi\Request\Stats\Params;

class PerModeTotalsPerGame extends PerMode
{
    const FORMAT = '^(Totals)|(PerGame)$';

    const VALID_OPTIONS = [
        self::TOTALS,
        self::PER_GAME,
    ];
}