<?php

namespace JasonRoman\NbaApi\Params\Data;

class SeasonTypeCodeParam extends AbstractParam
{
    const PRESEASON      = '01';
    const REGULAR_SEASON = '02';
    const PLAYOFFS       = '04';

    const OPTIONS = [
        self::PRESEASON,
        self::REGULAR_SEASON,
        self::PLAYOFFS,
    ];
}