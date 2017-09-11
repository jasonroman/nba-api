<?php

namespace JasonRoman\NbaApi\Tests\Unit\Request\Fixtures;

use JasonRoman\NbaApi\Tests\Unit\Param\AbstractUnitParam;

class TestOverrideRequest extends AbstractTestRequest
{
    const BASE_PARAM_CLASS = AbstractUnitParam::class;

    public $override;
    public $domainOverride;
}