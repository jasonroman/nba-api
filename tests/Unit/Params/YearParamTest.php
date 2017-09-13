<?php

namespace JasonRoman\NbaApi\Tests\Unit\Params;

use JasonRoman\NbaApi\Params\SeasonParam;
use JasonRoman\NbaApi\Params\SeasonYearParam;
use JasonRoman\NbaApi\Params\YearParam;
use PHPUnit\Framework\TestCase;

class YearParamTest extends TestCase
{
    public function testGetDefaultValue()
    {
        $this->assertSame(SeasonParam::currentSeasonStartYear(), YearParam::getDefaultValue());
    }
}