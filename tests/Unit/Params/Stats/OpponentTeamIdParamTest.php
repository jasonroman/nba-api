<?php

namespace JasonRoman\NbaApi\Tests\Unit\Params\Stats;

use JasonRoman\NbaApi\Params\Stats\OpponentTeamIdParam;
use PHPUnit\Framework\TestCase;

class OpponentTeamIdParamTest extends TestCase
{
    // this is not hit by functional tests...adding here for code coverage
    public function testGetDefaultValue()
    {
        $this->assertSame(OpponentTeamIdParam::MIN_ALL, OpponentTeamIdParam::getDefaultValue());
    }
}