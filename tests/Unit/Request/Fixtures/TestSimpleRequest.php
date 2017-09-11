<?php

namespace JasonRoman\NbaApi\Tests\Unit\Request\Fixtures;

class TestSimpleRequest extends AbstractTestRequest
{
    const ENDPOINT = 'simple/{test}/request.json';

    protected $protectedNotParam;

    private $privateNotParam;

    /**
     * @var string
     */
    public $test;

    /**
     * @var int
     */
    public $queryParam;
}