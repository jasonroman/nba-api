<?php declare(strict_types = 1);

namespace JasonRoman\NbaApi\Params\StatsProd;

class NamesParam extends AbstractStatsProdParam
{
    const OFFENSIVE = 'offensive';
    const DEFENSIVE = 'defensive';

    const OPTIONS = [
        self::OFFENSIVE,
        self::DEFENSIVE,
    ];
}