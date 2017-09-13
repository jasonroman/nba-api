<?php

namespace JasonRoman\NbaApi\Tests\Unit\Params\StatsProd;

use JasonRoman\NbaApi\Params\SeasonParam as BaseSeasonParam;
use JasonRoman\NbaApi\Params\StatsProd\SeasonParam;
use PHPUnit\Framework\TestCase;

class SeasonParamTest extends TestCase
{
    public function testGetDefaultValue()
    {
        $this->assertSame(BaseSeasonParam::currentSeasonStartYear(), SeasonParam::getDefaultValue());
    }
}