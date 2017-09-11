<?php

namespace JasonRoman\NbaApi\Tests\Unit\Request\Fixtures;

use JasonRoman\NbaApi\Request\AbstractNbaApiRequest;

abstract class AbstractTestRequest extends AbstractNbaApiRequest
{
    const BASE_URI       = 'http://localhost/';
    const BASE_NAMESPACE = 'JasonRoman\NbaApi\Tests';
}