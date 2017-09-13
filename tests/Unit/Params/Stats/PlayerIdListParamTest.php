<?php

namespace JasonRoman\NbaApi\Tests\Unit\Params\Stats;

use JasonRoman\NbaApi\Params\Stats\PlayerIdListParam;
use PHPUnit\Framework\TestCase;

class PlayerIdListParamTest extends TestCase
{
    /**
     * @return array
     */
    public function dataProviderForTestGetStringValue()
    {
        return [
            [true, ''],
            [false, ''],
            [-1, ''],
            ['hey', ''],
            [[1, 2, 3], '1,2,3'],
            [['1', 2, '3'], '1,2,3'],
            [['hey', 'some id', 3], 'hey,some id,3'],
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
        $this->assertSame($expected, PlayerIdListParam::getStringValue($value));
    }
}