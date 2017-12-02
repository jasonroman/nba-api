<?php declare(strict_types = 1);

namespace JasonRoman\NbaApi\Params\Stats;

class ActiveTeamsOnlyParam extends AbstractYesParam
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