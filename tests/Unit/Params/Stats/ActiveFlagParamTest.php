<?php

namespace JasonRoman\NbaApi\Tests\Unit\Params\Stats;

use JasonRoman\NbaApi\Params\Stats\ActiveFlagParam;
use PHPUnit\Framework\TestCase;

class ActiveFlagParamTest extends TestCase
{
    /**
     * @return array
     */
    public function dataProviderForTestGetStringValue()
    {
        return [
            [true, ActiveFlagParam::YES],
            [false, ActiveFlagParam::NO],
            [-1, ActiveFlagParam::YES],
            ['hey', ActiveFlagParam::YES],
            [null, ActiveFlagParam::NO],
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
        $this->assertSame($expected, ActiveFlagParam::getStringValue($value));
    }
}