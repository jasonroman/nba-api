<?php

namespace JasonRoman\NbaApi\Request\Data\Cms;

use JasonRoman\NbaApi\Client\Data\DataCmsClient;
use JasonRoman\NbaApi\Params\Data\SummerLeagueAbbrevParam;
use JasonRoman\NbaApi\Params\Stats\PeriodParam;
use JasonRoman\NbaApi\Request\Data\AbstractDataRequest;

/**
 * Base class which any Data\Cms requests must extend from.
 */
abstract class AbstractDataCmsRequest extends AbstractDataRequest
{
    const CLIENT = DataCmsClient::class;

    /**
     * {@inheritdoc}
     */
    public function getExampleValues(): array
    {
        return [
            'period'             => PeriodParam::MIN,
            'summerLeagueAbbrev' => SummerLeagueAbbrevParam::ORLANDO,
        ];
    }
}