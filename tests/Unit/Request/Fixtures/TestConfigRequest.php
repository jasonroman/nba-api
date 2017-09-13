<?php

namespace JasonRoman\NbaApi\Tests\Unit\Request\Fixtures;

class TestConfigRequest extends AbstractTestRequest
{
    const CONFIG = [
        'timeout'        => 5,
        'something_else' => 'hey',
    ];
}