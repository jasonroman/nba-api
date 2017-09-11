<?php

namespace JasonRoman\NbaApi\Request\Data\Cms;

use JasonRoman\NbaApi\Params\Data\SummerLeagueAbbrevParam;
use JasonRoman\NbaApi\Params\Stats\PeriodParam;
use JasonRoman\NbaApi\Request\Data\AbstractDataRequest;

/**
 * Base class which any Data\Cms requests must extend from.
 */
abstract class AbstractDataCmsRequest extends AbstractDataRequest
{
    /**
     * {@inheritdoc}
     */
    public static function getExampleValues(): array
    {
        return array_merge(parent::getExampleValues(), [
            'period'             => PeriodParam::MIN,
            'summerLeagueAbbrev' => SummerLeagueAbbrevParam::ORLANDO,
        ]);
    }
}