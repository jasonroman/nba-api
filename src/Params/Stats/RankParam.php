<?php declare(strict_types = 1);

namespace JasonRoman\NbaApi\Params\Stats;

class RankParam extends AbstractYesNoParam
{
    /**
     * {@inheritdoc}
     * @return bool
     */
    public static function getDefaultValue(): bool
    {
        return false;
    }
}