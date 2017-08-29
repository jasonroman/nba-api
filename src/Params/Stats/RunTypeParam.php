<?php
declare(strict_types = 1);

namespace JasonRoman\NbaApi\Params\Stats;

class RunTypeParam extends AbstractStatsParam
{
    const EACH_SECOND = 'each second';

    const OPTIONS = [
        self::EACH_SECOND,
    ];

    /**
     * {@inheritdoc}
     * @return string
     */
    public static function getDefaultValue() : string
    {
        return self::EACH_SECOND;
    }
}