<?php

namespace JasonRoman\NbaApi\Tests\Unit\Request\Fixtures;

use JasonRoman\NbaApi\Response\ResponseType;

class TestResponseTypeRequest extends AbstractTestRequest
{
    const ENDPOINT = 'test/test.pdf';

    const DEFAULT_RESPONSE_TYPE = ResponseType::PDF;
}