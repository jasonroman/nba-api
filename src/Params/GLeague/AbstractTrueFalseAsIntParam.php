<?php
declare(strict_types = 1);

namespace JasonRoman\NbaApi\Params\Stats;

use JasonRoman\NbaApi\Params\GLeague\AbstractGLeagueParam;

abstract class AbstractTrueFalseAsIntParam extends AbstractGLeagueParam
{
    /**
     * Returns a true/false value as '1' or '0'.
     *
     * {@inheritdoc}
     */
    public static function getStringValue($value): string
    {
        return ($value) ? (string) 1 : (string) 0;
    }
}