<?php

namespace JasonRoman\NbaApi\Tests\Unit\Params\Stats;

use JasonRoman\NbaApi\Params\Stats\AbstractYesNoParam;
use PHPUnit\Framework\TestCase;

class AbstractYesNoParamTest extends TestCase
{
    /**
     * @return array
     */
    public function dataProviderForTestGetStringValue()
    {
        return [
            [true, AbstractYesNoParam::YES],
            [false, AbstractYesNoParam::NO],
            [-1, AbstractYesNoParam::YES],
            ['hey', AbstractYesNoParam::YES],
            [null, AbstractYesNoParam::NO],
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
        $this->assertSame($expected, AbstractYesNoParam::getStringValue($value));
    }
}