<?php declare(strict_types = 1);

namespace JasonRoman\NbaApi\Params\Stats;

class GameDateParam extends AbstractDateParam
{
    /**
     * {@inheritdoc}
     * @return \DateTime
     */
    public static function getDefaultValue(): \DateTime
    {
        return new \DateTime();
    }
}