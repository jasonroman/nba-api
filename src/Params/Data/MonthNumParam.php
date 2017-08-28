<?php

namespace JasonRoman\NbaApi\Params\Data;

class MonthNumParam extends AbstractDataParam
{
    const JAN = '01';
    const FEB = '02';
    const MAR = '03';
    const APR = '04';
    const MAY = '05';
    const JUN = '06';
    const JUL = '07';
    const AUG = '08';
    const SEP = '09';
    const OCT = '10';
    const NOV = '11';
    const DEC = '12';

    const OPTIONS = [
        self::JAN,
        self::FEB,
        self::MAR,
        self::APR,
        self::MAY,
        self::JUN,
        self::JUL,
        self::AUG,
        self::SEP,
        self::OCT,
        self::NOV,
        self::DEC,
    ];
}