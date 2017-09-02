<?php

namespace JasonRoman\NbaApi\Request\StatsProd\StatsCms;

use JasonRoman\NbaApi\Client\AbstractStatsProdClient;
use JasonRoman\NbaApi\Client\StatsProd\StatsProdStatsCmsClient;
use JasonRoman\NbaApi\Params\StatsProd\NamesParam;
use JasonRoman\NbaApi\Request\StatsProd\AbstractStatsProdRequest;

abstract class AbstractStatsProdStatsCmsRequest extends AbstractStatsProdRequest
{
    const CLIENT = StatsProdStatsCmsClient::class;

    /**
     * {@inheritdoc}
     */
    public function getExampleValues(): array
    {
        return array_merge(parent::getExampleValues(), [
            'season' => 2015,
            'names'  => NamesParam::OFFENSIVE,
        ]);
    }
}