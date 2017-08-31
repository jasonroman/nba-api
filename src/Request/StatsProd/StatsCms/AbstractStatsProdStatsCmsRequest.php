<?php

namespace JasonRoman\NbaApi\Request\StatsProd\StatsCms;

use JasonRoman\NbaApi\Client\AbstractStatsProdClient;
use JasonRoman\NbaApi\Client\StatsProd\StatsProdStatsCmsClient;
use JasonRoman\NbaApi\Request\StatsProd\AbstractStatsProdRequest;

abstract class AbstractStatsProdStatsCmsRequest extends AbstractStatsProdRequest
{
    const CLIENT = StatsProdStatsCmsClient::class;
}