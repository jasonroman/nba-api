<?php declare(strict_types = 1);

namespace JasonRoman\NbaApi\Params\StatsProd;

class LimitParam extends AbstractStatsProdParam
{
    const MIN = 1;
    const MAX = 500;

    const DEFAULT = 10;

    /**
     * {@inheritdoc}
     * @return int
     */
    public static function getDefaultValue(): int
    {
        return self::MAX;
    }
}