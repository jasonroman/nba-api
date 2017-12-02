<?php declare(strict_types = 1);

namespace JasonRoman\NbaApi\Params\StatsProd;

class OffsetParam extends AbstractStatsProdParam
{
    const MIN = 0;

    /**
     * {@inheritdoc}
     * @return int
     */
    public static function getDefaultValue(): int
    {
        return self::MIN;
    }
}