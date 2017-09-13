<?php

namespace JasonRoman\NbaApi\Tests\Unit\Request\Fixtures;

use JasonRoman\NbaApi\Tests\Unit\Params\Fixtures\AbstractUnitParam;

class TestOverrideRequest extends AbstractTestRequest
{
    const ENDPOINT = '/some/{override}/and/{domainOverride}.json';

    const BASE_PARAM_CLASS = AbstractUnitParam::class;

    public $override;
    public $domainOverride;
}