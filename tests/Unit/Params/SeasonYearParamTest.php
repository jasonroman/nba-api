<?php

namespace JasonRoman\NbaApi\Tests\Unit\Params;

use JasonRoman\NbaApi\Params\SeasonParam;
use JasonRoman\NbaApi\Params\SeasonYearParam;
use PHPUnit\Framework\TestCase;

class SeasonYearParamTest extends TestCase
{
    public function testGetDefaultValue()
    {
        $this->assertSame(SeasonParam::currentSeasonStartYear(), SeasonYearParam::getDefaultValue());
    }
}