<?php

namespace JasonRoman\NbaApi\Request\Stats\Data;

use JasonRoman\NbaApi\Request\Stats\AbstractStatsRequest;

abstract class AbstractStatsDataRequest extends AbstractStatsRequest
{
    /**
     * {@inheritdoc}
     */
    public function getExampleValues(): array
    {
        return array_merge(parent::getExampleValues(), [
            'year' => 2015,
        ]);
    }
}