<?php

namespace JasonRoman\NbaApi\Tests\Unit\Params\Stats;

use JasonRoman\NbaApi\Params\Stats\IsOnlyCurrentSeasonParam;
use PHPUnit\Framework\TestCase;

class IsOnlyCurrentSeasonParamTest extends TestCase
{
    /**
     * @return array
     */
    public function dataProviderForTestGetStringValue()
    {
        return [
            [true, '1'],
            [false, '0'],
            [-1, '-1'],
            ['hey', '0'],
            [null, '0'],
        ];
    }

    /**
     * @dataProvider dataProviderForTestGetStringValue
     *
     * @param mixed $value
     * @param string $expected
     */
    public function testGetStringValue($value, $expected)
    {
        $this->assertSame($expected, IsOnlyCurrentSeasonParam::getStringValue($value));
    }
}