<?php

namespace JasonRoman\NbaApi\Request\Data\Prod;

use JasonRoman\NbaApi\Params\Data\PlayoffSeriesIdParam;
use JasonRoman\NbaApi\Params\Stats\PeriodParam;
use JasonRoman\NbaApi\Request\Data\AbstractDataRequest;

/**
 * Base class which any Data\Prod requests must extend from.
 */
abstract class AbstractDataProdRequest extends AbstractDataRequest
{
    /**
     * {@inheritdoc}
     */
    public function getExampleValues(): array
    {
        return array_merge(parent::getExampleValues(), [
            'period'          => PeriodParam::MIN,
            'playoffSeriesId' => PlayoffSeriesIdParam::OPTIONS[0],
        ]);
    }
}