<?php

namespace JasonRoman\NbaApi\Tests\Unit\Request\Fixtures;

class TestHeadersRequest extends AbstractTestRequest
{
    const HEADERS = [
        'Accept'  => 'application/pdf',
        'Host'    => 'api.nba.net',
        'X-Other' => 'Other Header',
    ];
}